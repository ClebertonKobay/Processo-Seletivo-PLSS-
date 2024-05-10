<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chamados extends BaseModel
{
    protected $table = 'chamados';

    protected $fillable = [
        'titulo',
        'descricao',
        'prazo_solucao',
        'data_solucao',
        'categoria_id',
        'situacao_id'
    ];

    public function situacao()
    {
        return $this->belongsTo(Situacao::class, 'situacao_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function getDataCriacaoFormatadaAttribute()
    {
        return Carbon::create($this->created_at)->format('d/m/Y');
    }

    public function getPrazoSolucaoFormatadaAttribute()
    {
        return Carbon::create($this->prazo_solucao)->format('d/m/Y');
    }

    public function getDataSolucaoFormatadaAttribute()
    {
        if (!is_null($this->data_solucao)) {
            return Carbon::create($this->data_solucao)->format('d/m/Y');
        }
        return '';
    }

    public function getCreatedAtSemHoraAttribute()
    {
        return Carbon::create($this->created_at)->format('Y-m-d');
    }
}
