<?php

namespace App\Http\Livewire\Ttpp\Solicitud;

use App\Models\Documento;
use App\Models\DocumentoSolicitudTitulo;
use App\Models\Estudiante;
use Livewire\Component;

class RequisitosEnviados extends Component
{
    public $abrir = false;
    public $estudiante = null;
    public $nombreDocumento = "";
    public $nombreRequisito = "";
    public $docSolBachID = 0;
    public $docID = 0;

    protected $listeners = [
        'requisitoGuardado' => 'render'
    ];
    public function render()
    {
        $this->requisitosEnviados();
        return view('livewire.ttpp.solicitud.requisitos-enviados');
    }
    public function borrarDocumento($id, $docID, $nombreDocumento, $nombreRequisito)
    {
        $this->abrir = true;
        $this->nombreDocumento = $nombreDocumento;
        $this->nombreRequisito = $nombreRequisito;
        $this->docSolBachID = $id;
        $this->docID = $docID;
    }

    public function borrarDefinitivamente()
    {
        //Eliminar fila de DocumentoSolicitudBachiller
        $doc = DocumentoSolicitudTitulo::findOrFail($this->docSolBachID);
        $doc->delete();

        //Eliminar el documento asociado
        $documento = Documento::findOrFail($this->docID);
        $documento->delete();

        //Emitir evento
        $this->emit('requisitoEliminado');
        $this->reset(['abrir', 'nombreDocumento', 'nombreRequisito', 'docSolBachID', 'docID']);
    }

    public function requisitosEnviados()
    {
        $this->estudiante = Estudiante::query()
            ->where('persona_id', auth()->user()->persona_id)
            ->with('solicitud')
            ->first();
    }
}
