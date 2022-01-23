<?php

namespace App\Http\Controllers;


use App\Models\ShortLink;
use Illuminate\Http\Request;


class ShortLinkController extends Controller
{
     public function index()
     {
         return view('shortenLink', [
             'shortLinks' => ShortLink::latest()->get() // Вернуть все ссылки с БД
         ]);
     }

     public function store(Request $request)
     {
        $request->validate([
           'link' => "required|url"
        ]);

        ShortLink::create([
            'link' => $request->link,  // Создаем запись в БД
            'code' => str_random()  // Генерация ссылки. Это хелпер и его нужно отдельно подключить как отдельный пакет composer.
        ]);

        return redirect()->route('generate.shorten.link')
            ->with('success', 'Короткая ссылка успешно создана!');
     }

     public function shortenLink($code)
     {
         $link = ShortLink::where('code', $code)->first(); // Найти в БД запсиь с кодом, выбрать первый
         $link->count++;  // Увеличили счетчик на 1
         $link->save();

         return redirect($link->link);
     }

}
