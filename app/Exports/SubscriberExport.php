<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use RegistersEventListeners;

    public function __construct($from, $until)
    {
        $this->from  = $from;
        $this->until = $until;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Email',
            'Fecha'
        ];
    }

    public function collection()
    {
        return Subscriber::when(! empty($this->from) && ! empty($this->until), function ($query) {
            return $query->whereBetween('created_at',array($this->from." 00:00:00", $this->until." 23:59:59"));
        })->select('name', 'email', 'created_at')->get();
    }
}