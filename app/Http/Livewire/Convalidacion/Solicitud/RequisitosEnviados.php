<?php

namespace App\Http\Livewire\Convalidacion\Solicitud;

use App\Models\DocumentoConvalidacion;
use App\Models\Documento;
use App\Models\Estudiante;
use Livewire\Component;

class RequisitosEnviados extends Component
{
    public $abrir = false;
    public $estudiante = null;
    public $nombreDocumento = "";
    public $nombreRequisito = "";
    public $docSolConvID = 0;
    public $docID = 0;

    protected $listeners = [
        'requisitoGuardado' => 'render'
    ];
    public function render()
    {
        $this->requisitosEnviados();
        return view('livewire.convalidacion.solicitud.requisitos-enviados');
    }
    public function borrarDocumento($id, $docID, $nombreDocumento, $nombreRequisito)
    {
        $this->abrir = true;
        $this->nombreDocumento = $nombreDocumento;
        $this->nombreRequisito = $nombreRequisito;
        $this->docSolConvID = $id;
        $this->docID = $docID;
    }

    public function borrarDefinitivamente()
    {
        //Eliminar fila de DocumentoSolicitudBachiller
        $doc = DocumentoConvalidacion::findOrFail($this->docSolConvID);
        $doc->delete();

        //Eliminar el documento asociado
        $documento = Documento::findOrFail($this->docID);
        $documento->delete();

        //Emitir evento
        $this->emit('requisitoEliminado');
        $this->reset(['abrir', 'nombreDocumento', 'nombreRequisito', 'docSolConvID', 'docID']);
    }

    public function requisitosEnviados()
    {
        $this->estudiante = Estudiante::query()
            ->where('persona_id', auth()->user()->persona_id)
            ->with('solicitudConvalidacion')
            ->first();
    }
}
