<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::when(request()->has('q'),function($q){
            $q->where( function (Builder $builder) {

                $key = request()->q;

                $builder->where('contact_name','like','%'.$key.'%');
                $builder->orWhere('contact_email','like','%'.$key.'%');
            });
        })
        ->when(Auth::user()->role !== 'admin',function($query){
            $query->where('user_id',Auth::id());
        })
        ->when(request()->has('name'),function($q){
            $key = request()->name ?? "asc";
            $q->orderBy('contact_name',$key);
        })
        ->latest('id')
        ->paginate(10)
        ->withQueryString();
        return view('dashboard.index',compact('contacts'));
    }

    public function indexFav()
    {
        $contacts = Contact::when(request()->has('q'),function($q){
            $q->where( function (Builder $builder) {

                $key = request()->q;

                $builder->where('contact_name','like','%'.$key.'%');
                $builder->orWhere('contact_email','like','%'.$key.'%');
            });
        })
        ->when(Auth::user()->role !== 'admin',function($query){
            $query->where('user_id',Auth::id());
        })
        ->where('contact_favorite','like','yes')
        ->when(request()->has('name'),function($q){
            $key = request()->name ?? "asc";
            $q->orderBy('contact_name',$key);
        })
        ->latest('id')
        ->paginate(10)
        ->withQueryString();
        return view('dashboard.index-fav',compact('contacts'));
    }


    public function categorizedIndex()
    {
        return view('dashboard.categorized-index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        return $request;
        $contact = new Contact();
        $contact->contact_name = $request->contact_name;
        $contact->contact_phone = $request->contact_phone;
        $contact->contact_email = $request->contact_email;
        $contact->contact_address = $request->contact_address;
        $contact->contact_thumbnail = $request->contact_thumbnail;
        $contact->contact_gender = $request->contact_gender;
        $contact->user_id = Auth::id();
        $contact->contact_favorite = $request->contact_favorite;
        $contact->category_id = $request->category_id;
        $contact->save();
        return redirect()->route('contact.index')->with(['message' => 'Contact created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('dashboard.show',compact('contact'));
    }

    /**
     * This must take note......................................................................******
      */

    public function categorizedShow($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('dashboard.categorized-show',[
            'category' => $category,
            'contacts' => $category->contacts()->when(request()->has('q'),function($q){
                $q->where( function (Builder $builder) {
    
                    $key = request()->q;
    
                    $builder->where('contact_name','like','%'.$key.'%');
                    $builder->orWhere('contact_email','like','%'.$key.'%');
                });
            })
            ->when(Auth::user()->role !== 'admin',function($query){
                $query->where('user_id',Auth::id());
            })
            ->when(request()->has('name'),function($q){
                $key = request()->name ?? "asc";
                $q->orderBy('contact_name',$key);
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        // return $request;
        $contact->contact_name = $request->contact_name;
        $contact->contact_phone = $request->contact_phone;
        $contact->contact_email = $request->contact_email;
        $contact->contact_address = $request->contact_address;
        $contact->contact_thumbnail = $request->contact_thumbnail;
        $contact->contact_gender = $request->contact_gender;
        $contact->contact_favorite = $request->contact_favorite;
        $contact->category_id = $request->category_id;
        $contact->update();
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with(['message' => 'Contact deleted successfully']);
    }
}
