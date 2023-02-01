<?php

namespace App\Http\Controllers;

use App\Models\Comics;



use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comics::all();

        return view('comics.index', [
            "comics" => $comics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:10 |max:200",
            "description" => "required|string",
            "series" => "required|string",
            "type" => "string"
            // devi mettere anche gli altri
        ]);


        // recuperiamo tutti i dati inviati dal form sotto forma di array associativo
        $data = $request->all();

        $comic = New Comics();
        $comic->description=$data["description"];
        $comic->thumb=$data["thumb"];
        $comic->price=(float)$data["price"];
        $comic->series=$data["series"];
        $comic->sale_date=$data["sale_date"];
        $comic->description=$data["type"];
        $comic->save();
        
        //una volta creato il nuovo utente/fumetto e recuperato i dati di questo reindirizzo
        //alla pagina dell'utente/fumetto appena creato, tutto ciò per:
        // Per evitare che l'utente rimanga sulla pagina in POST,
        // e ricaricando la pagina possa reinviare gli stessi dati,
        // reindirizziamo l'utente ad un'altra pagina a nostro piacimento.
        // Se la pagina ha un parametro dinamico, dobbiamo passarlo come secondo
        // argomento della funzione route.
        return redirect()->route('comics.show', $comic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comics::findOrFail($id);
        
        return view('comics.show', [
            "comic" => $comic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comics::findOrFail($id);

        return view('comics.edit', [$comic->$id]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
         // Siccome usiamo la dependencyInjection, il findOrFail viene fatto automaticamente
          $comic = Comics::findOrFail($id);

        //sul film appena modificato vado ad aggiornare i dati
        $comic->update($data);

        //Il validate oltre a controllare i dati mi ritoena i dati indicati
        $data = $request->validate([
            "title" => "required"
        ]);

        $comic = Comics::findOrFail($id);
        $comic->update($data);

        return redirect()->route('comics.show', $comic->$id);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comics::findOrFail($id);

        //Qui, sull'istanza dek model, il metodo da usare e il delete
        //Cosi facendo eliminerà quella riga dalla tabella
        $comic->delete();

        //Una volta eliminato l'elemento dalla tabella devo reindirizzare
        //l'utente da un'altra parte
        return redirect()-> route('comics.index');
    }
}
