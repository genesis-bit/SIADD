<?php

use App\Http\Controllers\AnoAcademicoController;
use App\Http\Controllers\AnoLectivoController;
use App\Http\Controllers\AvaliacaoHasDocenteController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\AvaliadorHasAvaliacaoController;
use App\Http\Controllers\CadController;
use App\Http\Controllers\CadHasAvaliacaoController;
use App\Http\Controllers\CadHasdocenteController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DimensaoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocenteHasDisciplinaController;
use App\Http\Controllers\DocumentoComprovanteController;
use App\Http\Controllers\EstadoCadController;
use App\Http\Controllers\EstadoRespostaController;
use App\Http\Controllers\EstudanteAvaliaDocenteController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\EstudanteHasDisciplinaController;
use App\Http\Controllers\GrauAcademicoController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\IndicadorEstudanteController;
use App\Http\Controllers\NivelAcessoController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\PercentagemContratacaoController;
use App\Http\Controllers\PeriodoAvaliacaoController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TurmaHasCursoController;
use App\Http\Controllers\TurmaHasEstudanteController;
use App\Http\Controllers\TurmaHasDocenteController;
use App\Http\Controllers\UnidadeOrganicaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\funcaoController;
use App\Models\avaliador;
use App\Models\turma_has_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/resposta/docente/{id}',[AvaliacaoHasDocenteController::class,'respostasDocente']);
Route::get('/resultadoParametro',[AvaliacaoHasDocenteController::class,'TotalPorParametro']);
Route::get('/docente/classificacao/{idProfessor}',[AvaliacaoHasDocenteController::class,'ResultadoDocente']);
Route::get('/docente/classificacao/',[AvaliacaoHasDocenteController::class,'ClassificacaoGeral']);
Route::get('/docente/cad/{idCad}',[CadHasDocenteController::class,'DocentesCad']);
Route::get('/docente/qtdcontratacao',[DocenteController::class,'QtdContratacao']);
Route::get('/disciplina/docente/{id}',[DocenteController::class,'disciplinaDocente']);
Route::get('/turma/docente/{id}',[TurmaHasCursoController::class,'turmaDocente']);
Route::get('/cad/ativarcad/{idcad}',[CadController::class,'ativarcad']);
Route::get('elegerdocente/cad',[cadHasDocenteController::class,'DocenteParaCad']);
Route::get('/avaliador/docente/{idavaliador}',[AvaliadorController::class,'docentesAvaliador']);
Route::get('/dashboard/{idProfessor}',[AvaliacaoHasDocenteController::class,'historicoProfessor']);
Route::get('/periodo/historico',[AvaliacaoHasDocenteController::class,'HistoricoPeriodo']);
//Route::get('/dimensao/parametro',[ParametroController::class,'dimensaoParametro']);
Route::get('/dimensao/parametro/{iddimensao}',[ParametroController::class,'dimensaoParametro']);
Route::get('avaliacao/documento/{pasta}/{documento}',[AvaliacaoHasDocenteController::class,'downloadDocumento']);
Route::put('/avaliacao/validar',[AvaliacaoHasDocenteController::class, 'validaravaliacao']);
Route::resources([
                   'grauAcademico'=>GrauAcademicoController::class,
                   'nivelAcesso'=>NivelAcessoController::class,
                   'anoLectivo'=>AnoLectivoController::class,
                   'estudante'=>EstudanteController::class,
                   'semestre'=>SemestreController::class,
                   'departamento'=>DepartamentoController::class,
                   'unidadeOrganica'=>UnidadeOrganicaController::class,
                   'categoria'=>CategoriaController::class,
                   'curso'=>CursoController::class,
                   'anoAcademico'=>AnoAcademicoController::class,
                   'turma'=>TurmaController::class,
                   'turmaEstudante'=>TurmaHasEstudanteController::class,
                   'percentagemContratacao'=>PercentagemContratacaoController::class,
                   'docente'=>DocenteController::class,
                   'disciplina'=>DisciplinaController::class,
                   'estadoCad'=>EstadoCadController::class,
                   'dimensao'=>DimensaoController::class,
                   'parametro'=>ParametroController::class,
                   'periodoAvaliacao'=>PeriodoAvaliacaoController::class,
                   'cad'=>CadController::class,
                   'estudanteDisciplina'=>EstudanteHasDisciplinaController::class,
                   'indicador'=>IndicadorController::class,
                   'cadDocente'=>CadHasdocenteController::class,
                   'documentoComprovante'=>DocumentoComprovanteController::class,
                   'estadoResposta'=>EstadoRespostaController::class,
                   'avaliacaoDocente'=>AvaliacaoHasDocenteController::class,
                   'cadAvaliacao'=>CadHasAvaliacaoController::class,
                   'avaliadorAvaliacao'=>AvaliadorHasAvaliacaoController::class,
                   'docenteDisciplina'=>DocenteHasDisciplinaController::class,
                   'estudanteAvaliacao'=>EstudanteAvaliaDocenteController::class,
                   'avaliador'=>AvaliadorController::class,
                   'cargo'=>CargoController::class,
                   'indicadorEstudante'=>IndicadorEstudanteController::class,
                   'turmaCurso'=>TurmaHasCursoController::class,
                   'turmaDocente'=>TurmaHasDocenteController::class,
                   'funcao'=>funcaoController::class
                ]);
