<?php

declare(strict_types=1);
//principio de inversion de dependencia.
/* Los Módulos de alto nivel donde existe las reglas de negocio no deben depender de los módulos de bajo nivel, no instanciar objetos en el constructo, es mala practica */

interface ReportInterface
{
    public function generate(string $content);
}

class PDFReport implements ReportInterface
{
    public function generate(string $content): void
    {
        echo "se crea PDF con el contenido $content";
    }
}

class XMLReport implements ReportInterface
{
    public function generate(string $content): void
    {
        echo "se crea XML con el contenido $content";
    }
}

class Estimate
{
    private ReportInterface $report;

    public function __construct(ReportInterface $report)
    {

        //si instancias una clase, te jodes, ya que tendras si o si que modificar la clase
        //$this->report=new Report();

        //usa mejor un objeto que dependa de una interface que exija esa funcionalidad
        $this->report = $report;
    }

    public function process()
    {
        echo "Se genera la estimación <br>";
        $this->report->generate("Contenido de la estimación");
    }
}

$PDFReport = new PDFReport();
$XMLReport = new XMLReport();

$estimate = new Estimate($PDFReport);
$estimate->process();
