<?php

namespace Callmeaf\Role\App\Imports\Admin\V1;

use Callmeaf\Base\App\Services\Importer;
use Callmeaf\Role\App\Enums\RoleStatus;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RolesImport extends Importer implements ToCollection,WithChunkReading,WithStartRow,SkipsEmptyRows,WithValidation,WithHeadingRow
{
    private RoleRepoInterface $roleRepo;

    public function __construct()
    {
        $this->roleRepo = app(RoleRepoInterface::class);
    }

    public function collection(Collection $collection)
    {
        $this->total = $collection->count();

        foreach ($collection as $row) {
            $this->roleRepo->freshQuery()->create([
                // 'status' => $row['status'],
            ]);
            ++$this->success;
        }
    }

    public function chunkSize(): int
    {
        return \Base::config('import_chunk_size');
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        $table = $this->roleRepo->getTable();
        return [
            // 'status' => ['required',Rule::enum(RoleStatus::class)],
        ];
    }

}
