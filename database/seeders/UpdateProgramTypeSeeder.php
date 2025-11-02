<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programs;
use Illuminate\Support\Facades\DB;

class UpdateProgramTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Updating program_type for existing programs...');
        
        // Get all programs
        $programs = Programs::all();
        
        if ($programs->isEmpty()) {
            $this->command->warn('No programs found in database.');
            return;
        }
        
        $this->command->info("Found {$programs->count()} programs.");
        
        foreach ($programs as $program) {
            // Skip if already has program_type
            if ($program->program_type) {
                $this->command->line("Program '{$program->name}' already has program_type: {$program->program_type}");
                continue;
            }
            
            // Auto-detect based on name, code, or type
            $name = strtolower($program->name ?? '');
            $code = strtolower($program->code ?? '');
            $type = strtolower($program->type ?? '');
            
            $programType = null;
            
            // Outbound indicators
            if (str_contains($name, 'outbound') || 
                str_contains($code, 'outbound') ||
                str_contains($name, 'iisma') || 
                str_contains($code, 'iisma') ||
                str_contains($name, 'uper') ||
                str_contains($code, 'uper') ||
                str_contains($name, 'study abroad') ||
                str_contains($name, 'overseas')) {
                $programType = 'outbound';
            }
            // Inbound indicators
            elseif (str_contains($name, 'inbound') || 
                    str_contains($code, 'inbound') ||
                    str_contains($name, 'exchange program') ||
                    str_contains($name, 'student exchange') ||
                    str_contains($name, 'international student')) {
                $programType = 'inbound';
            }
            
            if ($programType) {
                $program->program_type = $programType;
                $program->save();
                $this->command->info("✓ Updated '{$program->name}' -> {$programType}");
            } else {
                $this->command->warn("⚠ Could not auto-detect program_type for '{$program->name}' (code: {$program->code})");
                $this->command->warn("  Please update manually or add to seeder logic.");
            }
        }
        
        $this->command->newLine();
        $this->command->info('Update completed!');
        $this->command->newLine();
        
        // Show summary
        $inboundCount = Programs::where('program_type', 'inbound')->count();
        $outboundCount = Programs::where('program_type', 'outbound')->count();
        $nullCount = Programs::whereNull('program_type')->count();
        
        $this->command->table(
            ['Program Type', 'Count'],
            [
                ['Inbound', $inboundCount],
                ['Outbound', $outboundCount],
                ['Not Set (NULL)', $nullCount],
                ['Total', $programs->count()],
            ]
        );
        
        if ($nullCount > 0) {
            $this->command->newLine();
            $this->command->warn("⚠ {$nullCount} program(s) still have NULL program_type.");
            $this->command->info('You can update them manually in the admin panel or database.');
            
            // Show programs with NULL program_type
            $nullPrograms = Programs::whereNull('program_type')->get(['id', 'name', 'code', 'type']);
            if ($nullPrograms->isNotEmpty()) {
                $this->command->newLine();
                $this->command->warn('Programs that need manual update:');
                $tableData = $nullPrograms->map(function($p) {
                    return [$p->id, $p->name, $p->code ?? '-', $p->type ?? '-'];
                })->toArray();
                $this->command->table(['ID', 'Name', 'Code', 'Type'], $tableData);
            }
        }
    }
}
