<?php

namespace Callmeaf\Role\App\Exports\Admin\V1;

use Callmeaf\Role\App\Models\Role;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class RolesExport implements FromCollection,WithHeadings,Responsable,WithMapping,WithCustomChunkSize
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = '';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    private RoleRepoInterface $roleRepo;
    public function __construct()
    {
        $this->roleRepo = app(RoleRepoInterface::class);
        $this->fileName = $this->fileName ?: \Base::exportFileName(model: $this->roleRepo->getModel()::class,extension: $this->writerType);
    }

    public function collection()
    {
        if(\Base::getTrashedData()) {
            $this->roleRepo->trashed();
        }

        $this->roleRepo->latest()->search();

        if(\Base::getAllPagesData()) {
            return $this->roleRepo->lazy();
        }

        return $this->roleRepo->paginate();
    }

    public function headings(): array
    {
        return [
           // 'status',
        ];
    }

    /**
     * @param Role $row
     * @return array
     */
    public function map($row): array
    {
        return [
            // $row->status?->value,
        ];
    }

    public function chunkSize(): int
    {
        return \Base::config('export_chunk_size');
    }
}
