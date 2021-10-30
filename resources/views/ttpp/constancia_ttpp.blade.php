<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('icons/file_pdf.png') }}">
    <title>Titulo Profesional</title>
    <style>
        * {
            margin: 4.75mm 4mm 2.5mm 6.5mm;
            padding: 0;
        }

        div {
            padding: 0;
        }

        body {
            font-family: 'PT Serif', serif;
        }

        .document {
            border: 6px solid #000080;
            padding: 5mm 4mm 5mm 7mm;
            position: relative;
        }

        .document:before {
            content: " ";
            position: absolute;
            z-index: -1;
            top: -28px;
            left: -35px;
            right: -67px;
            bottom: -46px;
            border: 2px solid black;
        }

        .escudo {
            width: 18mm;
        }

        .foto-contenedor {
            align-items: center;
            border: 2px black solid;
            height: 37mm;
            overflow: hidden;
            padding: 0 0 0 2px;
            text-align: center;
            width: 30mm;
            z-index: 10;
            position: relative;
        }

        .foto {
            background-position: center;
            background-size: cover;
            margin: 0 auto;
            object-fit: cover;
            width: 29mm;
            z-index: 0;
            position: relative;
        }

        .header {
            border-bottom: 1px solid #C51515;
            height: 30mm;
            margin: auto;
        }

        .w-160 {
            width: 160mm;
        }

    </style>

</head>

<body class="document">

<div class="header w-160" style="">

    <div style="float: left; margin-top: -3mm; text-align: left; width: 35mm; margin-left: -10px;">
        <img class="escudo" src="{{ asset('images/escudo_peru.jpg') }}" alt="Escudo del Peru">
    </div>

    <div style="float: left; margin-top: -2.5mm; padding: 0; text-align: center; width: 90mm; margin-left: -10px;">
        <p style="font-size: 0.625rem; color: #0F254F;">
            UNIVERSIDAD NACIONAL SANTIAGO ANTÚNEZ DE MAYOLO
        </p>
        <p style="font-size: 0.62rem; color: #0F254F; margin-top: -2.5mm;">
            {{ $estudiante->escuela->facultad->nombre }}
        </p>
        <p style="font-size: 0.6rem; font-style: italic; color: #041E88; margin-top: -2.5mm;">
            "Una Nueva Universidad para el Desarrollo"
        </p>
        <p style="font-size: 0.8rem; color: #C00000; font-weight: bold; width: 90%; margin: -2mm auto 0;">
            ESCUELA PROFESIONAL {{ strtoupper($estudiante->escuela->nombre) }}
        </p>
        <p style="font-size: 0.6rem; margin-top: 2px;">
            {{ $estudiante->escuela->facultad->direccion }} – Teléfono (043) 640020 Anexo 1913
        </p>
        <p style="font-size: 0.6rem; margin-top: -1.75mm;">
            HUARAZ – ANCASH – PERÚ
        </p>
    </div>

    <div
        style="float:left; margin-top: -2mm; width: 35mm; text-align: right; margin-left: -10px;">
        <img class="escudo" src="{{ asset('images/escudo_unasam.jpg') }}"
             alt="Escudo de la Unasam">
    </div>

</div>
<p style="position: absolute; top: 27.5mm; text-align: center; font-size: 0.65rem;" class="w-160">
    "Año del Bicentenario del Perú: 200 años de Independencia"
</p>

{{-- Foto --}}
<div style="position: absolute; top: 30mm; right: 4mm;">
    <div class="foto-contenedor">

        @if($estudiante->solicitud and $estudiante->solicitud->foto and $estudiante->solicitud->foto->documento)
            <img
                class="foto"
                src="{{ asset('storage/'.$estudiante->solicitud->foto->documento->enlace_interno) }}"
                alt="Foto del bachiller"/>
        @else
            <img
                class="foto"
                src="{{ asset('images/male_profile.jpg') }}"
                alt="Foto del bachiller"/>
        @endif

    </div>
</div>

<div style="position: absolute; top: 70mm;">
    <h1 style="text-align: center; font-size: 1.25rem;">
        CONSTANCIA DIGITAL DE TÍTULO PROFESIONAL
    </h1>

    <p style="font-style: italic; line-height: 1.25;">
        El Director (e) de Escuela Profesional de {{ $estudiante->escuela->nombre }}
        - {{ $estudiante->escuela->facultad->nombre }} - Universidad Nacional Santiago Antúnez de Mayolo. <br><br>
        Hace constar, que:

    </p>

    <h2 style="text-align: center; font-size: 1.175rem;">
        {{ $estudiante->persona->apellidos . ' ' . $estudiante->persona->nombres}}
    </h2>

    <p style="line-height: 1.25; font-style: italic;">
        Con código N° {{ $estudiante->codigo }}, ha culminado satisfactoriamente sus estudios en
        la Escuela Profesional de {{ $estudiante->escuela->nombre }}, en el periodo de estudios:
    </p>

    <p style="font-style: italic; line-height: 1.25;">
        Fecha de ingreso: Semestre académico 2015 – I, 27 marzo 2015.
        <br>
        Fecha de egreso: Semestre académico 2019 – II, 23 enero 2020.
    </p>

    <p style="font-style: italic; line-height: 1.25; text-align: right; margin-top: 8px;">
        Huaraz, {{ today()->format('d M Y') }}
    </p>
</div>

<div style="position: absolute; top: 185mm;">
    <div style="border-top: 1px solid black; width: 42.5%; float: left; padding: 0;">
        <div
            style="overflow: hidden; height: 5mm; margin-top: 1px; width: 80mm; margin-left: -5mm;  text-align: center;">
            <strong style="margin: 0; font-size: 0.9rem;">{{ $decano }}</strong>
        </div>
        <div style="overflow: hidden; margin-top: -10px; width: 80mm; margin-left: -5mm;  text-align: center;">
            <p style="margin: 0; font-size: 0.75rem;">
                Decano {{ $estudiante->escuela->facultad->nombre }}
            </p>
        </div>
    </div>
    <div style="border-top: 1px solid black; width: 42.5%; float: left; padding: 0;">
        <div
            style="overflow: hidden; height: 5mm; margin-top: 1px; width: 80mm; margin-left: -5mm;  text-align: center;">
            <strong style="margin: 0; font-size: 0.9rem;">{{ $director }}</strong>
        </div>
        <div style="overflow: hidden; margin-top: -10px; width: 80mm; margin-left: -5mm;  text-align: center;">
            <p style="margin: 0; font-size: 0.75rem;">
                Director(a) EP {{ $estudiante->escuela->nombre }}
            </p>
        </div>
    </div>
</div>

<div style="position:absolute; bottom: 0;">
    <div style="border-top: 2px solid black; height: 6mm">
    </div>
</div>
<div style="position:absolute; bottom: -4mm; left: 47mm;">
    <span style="color: white;">|</span>
    <img style="height: 12mm; padding: 5px; background: white;"
         src="{{ asset('images/unasam_licenciada.png') }}"
         alt="">
    <span style="color: white;">|</span>
</div>

</body>
</html>
