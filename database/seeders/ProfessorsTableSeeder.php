<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professors = [
            "ABIEL COSTA MACEDO",
            "ADRIANA ARAUJO CINTRA",
            "ALACYR JOSE GOMES",
            "ALINE DE SOUZA LIMA",
            "ALYSSON TOBIAS RIBEIRO DA CUNHA",
            "AMANDA BUOSI GAZON MILANI",
            "ANA PAULA PURCINA BAUMANN",
            "ANYELLE NOGUEIRA DE SOUZA",
            "ARMANDO MAURO VASQUEZ CORRO",
            "BENEDITO LEANDRO NETO",
            "BRUNO RODRIGUES DE FREITAS",
            "CYNTHIA ARANTES VIEIRA TOJEIRO",
            "DAVID HENRIQUES DA MATTA",
            "DOUGLAS HILARIO DA CRUZ",
            "DURVAL JOSE TONON",
            "EDCARLOS DOMINGOS DA SILVA",
            "EDER ANGELO MILANI",
            "ELISABETH CRISTINA DE FARIA",
            "EVERTON BATISTA DA ROCHA",
            "FABIANO FORTUNATO TEIXEIRA DOS SANTOS",
            "FABIO VITORIANO E SILVA",
            "GECI JOSE PEREIRA DA SILVA",
            "GLAYDSTON DE CARVALHO BENTO",
            "GREGORY DURAN CUNHA",
            "HIURI FELLIPE SANTOS DOS REIS",
            "HUMBERTO DE ASSIS CLIMACO",
            "IVONILDES RIBEIRO MARTINS DIAS",
            "JANICE PEREIRA LOPES",
            "JAQUELINE ARAUJO CIVARDI",
            "JEFFERSON DIVINO GONCALVES DE MELO",
            "JHONE CALDEIRA SILVA",
            "JOELMIR DIVINO CARLOS FELICIANO VILELA",
            "JOSE HILARIO DA CRUZ",
            "JOSE PEDRO MACHADO RIBEIRO",
            "KAMILA DA SILVA ANDRADE",
            "KARLY BARBOSA ALVARENGA",
            "KELEM GOMES LOURENCO",
            "LEANDRO DA FONSECA PRUDENTE",
            "LEVI ROSA ADRIANO",
            "LIDIANE DOS SANTOS MONTEIRO LIMA",
            "LUIS RODRIGO FERNANDES BAUMANN",
            "LUIS ROMAN LUCAMBIO PEREZ",
            "LUIZ FERNANDO GONCALVES",
            "MARCELO ALMEIDA DE SOUZA",
            "MARCELO BEZERRA BARBOZA",
            "MARCELO LOPES FERRO",
            "MARCOS LEANDRO MENDES CARVALHO",
            "MARIA BETHANIA SARDEIRO DOS SANTOS",
            "MARIO ERNESTO PISCOYA DIAZ",
            "MAX LEANDRO NOBRE GONCALVES",
            "MAX VALERIO LEMES",
            "MAXWELL LIZETE DA SILVA",
            "MOEMA GOMES MORAES",
            "OLE PETER SMITH",
            "ORIZON PEREIRA FERREIRA",
            "OTAVIO MARCAL LEANDRO GOMIDE",
            "PAULO HENRIQUE DE AZEVEDO RODRIGUES",
            "RENATO RODRIGUES SILVA",
            "RICARDO NUNES DE OLIVEIRA",
            "RODRIGO DONIZETE EUZEBIO",
            "ROGERIO DE QUEIROZ CHAVES",
            "RONALDO ANTONIO DOS SANTOS",
            "RONY CRISTIANO",
            "ROSANE GOMES PEREIRA",
            "ROSANGELA MARIA DA SILVA",
            "TATIANE FERREIRA DO NASCIMENTO MELO DA SILVA",
            "THAYNARA ARIELLY DE LIMA",
            "TIAGO MOREIRA VARGAS",
            "TICIANNE PROENCA BUENO ADORNO",
            "VALDIVINO VARGAS JUNIOR",
            "WALTER BATISTA DOS SANTOS",
            "WELLINGTON LIMA CEDRO",
            "MAYK JOAQUIM DOS SANTOS",
            "MILTON JAVIER CARDENAS MENDEZ",
            "SAMUEL CARLOS DE SOUZA FERREIRA",
            "STEFFANIO MORENO DE SOUSA"
        ];

        foreach ($professors as $professor) {
            Professor::create([
                'nomeProfessor' => $professor,
                'instituto' => 'IME',
                'Nota' => 0,
                'QtsAvalicao'=>0,
                'QtsN1'=>0,
                'QtsN2'=>0,
                'QtsN3'=>0,
                'QtsN4'=>0,
                'QtsN5'=>0,
                'QtsN6'=>0,
                'QtsN7'=>0,
                'QtsN8'=>0,
                'QtsN9'=>0,
                'QtsN10'=>0
            ]);
        }
    }
}
