<?php

namespace App\Console\Commands;

use Dedoc\Scramble\Generator;
use Dedoc\Scramble\Scramble;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateApiDocs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scramble:export {--output= : Output file path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate OpenAPI JSON documentation from Scramble';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $outputPath = $this->option('output') ?? base_path('../docs/api/openapi.json');
            
            // Ensure directory exists
            $directory = dirname($outputPath);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            // Get generator and config
            $generator = app(Generator::class);
            $config = Scramble::getGeneratorConfig(Scramble::DEFAULT_API);

            // Generate OpenAPI specification (already returns an array)
            $openApiArray = $generator($config);

            // Encode to JSON
            $json = json_encode($openApiArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

            if ($json === false) {
                $this->error('Failed to encode OpenAPI specification to JSON');
                return Command::FAILURE;
            }

            // Write to file
            File::put($outputPath, $json);

            $this->info("OpenAPI documentation generated successfully: {$outputPath}");
            $this->info("File size: " . number_format(strlen($json)) . " bytes");

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error("Error generating API documentation: " . $e->getMessage());
            $this->error($e->getTraceAsString());
            return Command::FAILURE;
        }
    }
}

