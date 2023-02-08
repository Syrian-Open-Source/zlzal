<?php

namespace App\Http\Export;

use App\Models\Cases;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\BeforeSheet;


class CasesExport implements WithHeadings, ShouldAutoSize, WithMapping,FromCollection,WithEvents
{
    use Exportable;

    public function registerEvents(): array
    {
        return [

            BeforeSheet::class  =>function(BeforeSheet $event){
                $event->getDelegate()->setRightToLeft(true);
            }
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cases::all();
    }
    /**
     * @var Cases $case
     */
    public function map($case): array
    {
        return [
            $case->name ?? '',
            $case->type ?? '',
            $case->phone ?? '',
            $case->description ,
            $case->medical_point_status,
            $case->city ?? '',
            $case->area ?? '',
            $case->street,
            $case->long,
            $case->lat,
            $case->created_at,
        ];
    }
    /**
     * @return array
     */

    public function headings(): array
    {
        return [
            'الاسم',
            'نوع الحالة',
            'وسيلة التواصل',
            'وصف الحالة',
            'حالة النقطة الطبية',
            'المدينة',
            'المنطقة',
            'الشارع',
            'خط الطول',
            'خط العرض',
            'تاريخ تسجيل الحالة',
        ];
    }
}
