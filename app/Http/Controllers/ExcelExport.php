<?php

namespace App\Http\Controllers;

use App\Models\Helli\etelaat_a;
use App\Models\Helli\etelaat_p;
use App\Models\Helli\Post;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExport extends Controller
{
    public function allPostsByFestival($username,$password,$festival)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //Columns
        $sheet->setRightToLeft(true);
        $sheet->setCellValue('A1', 'نام');
        $sheet->setCellValue('B1', 'نام خانوادگی');
        $sheet->setCellValue('C1', 'جنسیت');
        $sheet->setCellValue('D1', 'کد اثر');
        $sheet->setCellValue('E1', 'عنوان');
        $sheet->setCellValue('F1', 'قالب پژوهش');
        $sheet->setCellValue('G1', 'سطح ارزیابی');
        $sheet->setCellValue('H1', 'گروه علمی');
        $sheet->setCellValue('I1', 'استان تحصیل');
        $sheet->setCellValue('J1', 'شهر تحصیل');
        $sheet->setCellValue('K1', 'نام مدرسه');
        $sheet->setCellValue('L1', 'پایه');
        $sheet->setCellValue('M1', 'سطح');
        $sheet->setCellValue('N1', 'ترم');
        $sheet->setCellValue('O1', 'نوع پژوهش');
        $sheet->setCellValue('P1', 'تعداد صفحه');
        $sheet->setCellValue('Q1', 'بخش ویژه');
        $sheet->setCellValue('R1', 'نام پدر');
        $sheet->setCellValue('S1', 'کد ملی');
        $sheet->setCellValue('T1', 'تاریخ تولد');
        $sheet->setCellValue('U1', 'آدرس');
        $sheet->setCellValue('V1', 'تلفن ثابت');
        $sheet->setCellValue('W1', 'تلفن همراه');
        $sheet->setCellValue('X1', 'رشته دانشگاهی');
        $sheet->setCellValue('Y1', 'شماره پرونده تحصیلی');
        $sheet->setCellValue('Z1', 'رشته تخصصی حوزوی');
        $sheet->setCellValue('AA1', 'مرکز تخصصی حوزوی');
        $sheet->setCellValue('AB1', 'نام مرکز تحصیلی');
        $sheet->setCellValue('AC1', 'نوع تحصیلات حوزوی');
        $sheet->setCellValue('AD1', 'تحصیلات غیر حوزوی');
        //Get Data
        $counter=2;
        $posts = etelaat_a::where('jashnvareh', $festival)->orderBy('codeasar', 'asc')->get();

        foreach ($posts as $post) {
            $people = etelaat_p::where('codeasar', $post->codeasar)->get();
            foreach ($people as $person) {}
            $sheet->setCellValue('A' . $counter, $person->fname);
            $sheet->setCellValue('B' . $counter, $person->family);
            $sheet->setCellValue('C' . $counter, $post->gender);
            $sheet->setCellValue('D' . $counter, $post->codeasar);
            $sheet->setCellValue('E' . $counter, $post->nameasar);
            $sheet->setCellValue('F' . $counter, $post->ghalebpazhouhesh);
            $sheet->setCellValue('G' . $counter, $post->satharzyabi);
            $sheet->setCellValue('H' . $counter, $post->groupelmi);
            $sheet->setCellValue('I' . $counter, $person->ostantahsili);
            $sheet->setCellValue('J' . $counter, $person->shahrtahsili);
            $sheet->setCellValue('K' . $counter, $person->madrese);
            $sheet->setCellValue('L' . $counter, $person->paye);
            $sheet->setCellValue('M' . $counter, $person->sath);
            $sheet->setCellValue('N' . $counter, $person->term);
            $sheet->setCellValue('O' . $counter, $post->noepazhouhesh);
            $sheet->setCellValue('P' . $counter, $post->tedadsafhe);
            $sheet->setCellValue('Q' . $counter, $post->subject_bakhshvizheh);
            $sheet->setCellValue('R' . $counter, $person->father_name);
            $sheet->setCellValue('S' . $counter, $person->codemelli);
            $sheet->setCellValue('T' . $counter, $person->tarikhtavallod);
            $sheet->setCellValue('U' . $counter, $person->address);
            $sheet->setCellValue('V' . $counter, $person->telephone);
            $sheet->setCellValue('W' . $counter, $person->mobile);
            $sheet->setCellValue('X' . $counter, $person->reshtedaneshgahi);
            $sheet->setCellValue('Y' . $counter, $person->shparvandetahsili);
            $sheet->setCellValue('Z' . $counter, $person->reshtetakhasosihozavi);
            $sheet->setCellValue('AA' . $counter, $person->markaztakhasosihozavi);
            $sheet->setCellValue('AB' . $counter, $person->namemarkaztahsili);
            $sheet->setCellValue('AC' . $counter, $person->noetahsilathozavi);
            $sheet->setCellValue('AC' . $counter, $person->tahsilatghhozavi);
            $counter+=1;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'example.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);

    }
}
