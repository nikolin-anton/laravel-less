<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller {
    public function store(ContactRequest $request) {

     $contact = new Contact();
     $contact->name = $request->input('name');
     $contact->email = $request->input('email');
     $contact->subject = $request->input('subject');
     $contact->message = $request->input('message');
     $contact->image = $request->file('image')->store('uploads', 'public');

     $contact->save();

     return redirect()->route('contacts.index')->with('success', 'Контакт был добавлен');

    }



    public function index() {
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

    public function show($id) {
      $contact = new Contact();
      return view('one-messages', ['data' => $contact->find($id)]);
    }

    public function edit($id) {
       $contact = new Contact();
       return view('update-messages', ['data' => $contact->find($id)]);
    }


    public function update($id, ContactRequest $request) {

     $contact = Contact::find($id);
/*     $contact->name = $request->input('name');
     $contact->email = $request->input('email');
     $contact->subject = $request->input('subject');
     $contact->message = $request->input('message');
     $contact->save();*/
        $contact->image = $request->file('image')->store('uploads', 'public');
        $input = $request->all();
        $contact->update($input);


     return redirect()->route('contacts.show', $id)->with('success', 'Контакт был обновлен');

    }

    public function destroy($id)
    {
      $contact = Contact::find($id)->delete();
     return true;

    }
}
