<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller {
    public function submit(ContactRequest $request) {
     
     $contact = new Contact();
     $contact->name = $request->input('name');
     $contact->email = $request->input('email');
     $contact->subject = $request->input('subject');
     $contact->message = $request->input('message');

     $contact->save();

     return redirect()->route('home')->with('success', 'Сообщение было добавлено');

    }



    public function allData() {
      $contact = new Contact();
      // dd($contact->all());
      return view('messages', ['data' => $contact->all()]);

      //all() - вывести все записи из БД
      //find($id) - вывод записи по id
      //inRanderOrder($col) - вывод рандомных записей ($col - сколько записей вывести)
      //inRanderOrder()-first() - вывод одной рандомной записи
      //orderBy($pole, 'desc') - сортировка по указаному полю (ask - по возрастанию, desc - по спаданию)
      //take($count) - вывод указаного количества записей
      //skip($count) - пропустить указаное количество записей
      //where() - условие
    }

    public function showOneMessage($id) {
      $contact = new Contact();
      return view('one-messages', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
       $contact = new Contact();
       return view('update-messages', ['data' => $contact->find($id)]);
    }


    public function updateMessageSubmit($id, ContactRequest $request) {
     
     $contact = Contact::find($id);
     $contact->name = $request->input('name');
     $contact->email = $request->input('email');
     $contact->subject = $request->input('subject');
     $contact->message = $request->input('message');

     $contact->save();

     return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');

    }

    public function deleteMessage($id) 
    {
      $contact = Contact::find($id)->delete();
      return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }
}
