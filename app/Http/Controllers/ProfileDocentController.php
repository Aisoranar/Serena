<?php

namespace App\Http\Controllers;

use App\Models\ProfileDocent;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileDocentController extends Controller
{
    /**
     * Mostrar el perfil del docente.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Verifica si el docente existe en la base de datos
        $docente = ProfileDocent::with('user', 'department', 'city')->where('user_id', $id)->first();
        
        if (!$docente) {
            // Si no encuentra el docente, devuelve un 404
            abort(404, 'Docente no encontrado.');
        }

        // Retorna la vista con los datos del docente
        return view('view.docente.profile', compact('docente'));
    }

    /**
     * Crear el perfil del docente.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, User $user)
    {
        // Validamos los datos recibidos del formulario
        $data = $request->validate([
            'department_id' => 'required|exists:departments_and_cities,id',
            'city_id' => 'required|exists:departments_and_cities,id',
            'school' => 'required|in:Escuela de Ciencias,Escuela de Ciencias Sociales y de las Comunicaciones,Escuela Ingeniería Agroindustrial,Escuela Ingeniería Agronómica,Escuela Ingeniería Ambiental y de Saneamiento,Escuela Ingeniería de Producción,Escuela de Medicina Veterinaria y Zootecnia',
            'department' => 'required|string',
            'position' => 'required|string',
        ]);

        // Creamos el perfil del docente usando la información validada y el usuario asociado
        ProfileDocent::createFromUser($user, $data);

        // Redirigimos a la vista del perfil del docente con un mensaje de éxito
        return redirect()->route('docente.perfil.show', ['id' => $user->id])
            ->with('success', 'Perfil del docente creado con éxito.');
    }

    /**
     * Método de edición del perfil del docente.
     */
    public function edit($id)
    {
        // Obtenemos el perfil del docente
        $docente = ProfileDocent::findOrFail($id);

        // Verifica que la vista esté correctamente referenciada
        return view('view.docente.profile.edit', compact('docente'));
    }

    /**
     * Actualizar el perfil del docente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Buscamos el perfil del docente
        $docente = ProfileDocent::findOrFail($id);

        // Validamos los datos del formulario
        $data = $request->validate([
            'department' => 'required|string',
            'school' => 'required|in:Escuela de Ciencias,Escuela de Ciencias Sociales y de las Comunicaciones,Escuela Ingeniería Agroindustrial,Escuela Ingeniería Agronómica,Escuela Ingeniería Ambiental y de Saneamiento,Escuela Ingeniería de Producción,Escuela de Medicina Veterinaria y Zootecnia',
            'city' => 'required|string',
            'position' => 'required|string',
        ]);

        // Actualizamos el perfil con los datos validados
        $docente->update($data);

        // Redirigimos al perfil con un mensaje de éxito
        return redirect()->route('docente.perfil.show', ['id' => $docente->id])
            ->with('success', 'Perfil del docente actualizado con éxito.');
    }
}
