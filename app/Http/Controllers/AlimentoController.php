<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alimentos = Alimento::paginate(5);
        return view('alimento.index', compact('alimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Definir los mensajes personalizados para la validación
    $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
        'nombre.max' => 'El campo nombre no puede exceder los 100 caracteres.',
        'nombre.custom' => 'El campo nombre debe contener al menos 3 letras.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio.numeric' => 'El campo precio debe ser un número.',
        'precio.min' => 'El campo precio debe ser al menos 0.1.',
        'cantidad.required' => 'El campo cantidad es obligatorio.',
        'cantidad.integer' => 'El campo cantidad debe ser un número entero.',
        'cantidad.min' => 'El campo cantidad debe ser al menos 1.',
    ];

    // Validar los datos del request con reglas personalizadas
    $validatedData = $request->validate([
        'nombre' => [
            'required',
            'string',
            'max:100',
            function ($attribute, $value, $fail) {
                if (strlen(preg_replace('/[^a-zA-Z]/', '', $value)) < 3) {
                    $fail('El campo nombre debe contener al menos 3 letras.');
                }
            },
        ],
        'precio' => [
            'required',
            'numeric',
            function ($attribute, $value, $fail) {
                if ($value < 0.1) {
                    $fail('El campo precio debe ser al menos 0.1.');
                }
            },
        ],
        'cantidad' => [
            'required',
            'integer',
            function ($attribute, $value, $fail) {
                if ($value < 1) {
                    $fail('El campo cantidad debe ser al menos 1.');
                }
            },
        ],
    ], $messages);

    // Crear una nueva instancia de Alimento y asignar los valores validados
    $alimento = new Alimento;
    $alimento->nombre = $validatedData['nombre'];
    $alimento->precio = $validatedData['precio'];
    $alimento->cantidad = $validatedData['cantidad'];
    $alimento->save();

    return redirect()->back()->with('success', 'Alimento guardado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Alimento $alimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Definir los mensajes personalizados para la validación
    $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
        'nombre.max' => 'El campo nombre no puede exceder los 100 caracteres.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio.numeric' => 'El campo precio debe ser un número.',
        'precio.min' => 'El campo precio debe ser al menos 0.1.',
        'cantidad.required' => 'El campo cantidad es obligatorio.',
        'cantidad.integer' => 'El campo cantidad debe ser un número entero.',
        'cantidad.min' => 'El campo cantidad debe ser al menos 1.',
    ];

    // Validar los datos del request con reglas personalizadas
    $validatedData = $request->validate([
        'nombre' => [
            'required',
            'string',
            'max:100',
            function ($attribute, $value, $fail) {
                if (strlen(preg_replace('/[^a-zA-Z]/', '', $value)) < 3) {
                    $fail('El campo nombre debe contener al menos 3 letras.');
                }
            },
        ],
        'precio' => [
            'required',
            'numeric',
            function ($attribute, $value, $fail) {
                if ($value < 0.1) {
                    $fail('El campo precio debe ser al menos 0.1.');
                }
            },
        ],
        'cantidad' => [
            'required',
            'integer',
            function ($attribute, $value, $fail) {
                if ($value < 1) {
                    $fail('El campo cantidad debe ser al menos 1.');
                }
            },
        ],
    ], $messages);

    // Actualizar la instancia de Alimento con los valores validados
    $alimento = Alimento::find($id);
    $alimento->nombre = $validatedData['nombre'];
    $alimento->precio = $validatedData['precio'];
    $alimento->cantidad = $validatedData['cantidad'];
    $alimento->save();

    return redirect()->back()->with('success', 'Alimento actualizado exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alimento = Alimento::find($id);
        $alimento->delete();
        return redirect()->back();
    }
}
