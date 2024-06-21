@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{-- highchart --}}

            {{-- HTML --}}
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
            <figure class="highcharts-figure">
                <div id="container-jk"></div>
            </figure>

            {{-- CSS --}}
            <style>
                .highcharts-figure,
                .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 800px;
                    margin: 1em auto;
                }

                #container {
                    height: 400px;
                }

                .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 500px;
                }

                .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                }

                .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                }

                .highcharts-data-table td,
                .highcharts-data-table th,
                .highcharts-data-table caption {
                    padding: 0.5em;
                }

                .highcharts-data-table thead tr,
                .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                }

                .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                }
            </style>

            {{-- JS --}}
            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Mahasiswa Program Studi',
                        align: 'center'
                    },
                    subtitle: {
                        text: 'Source : Aplikasi Akademik',
                        align: 'center'
                    },
                    xAxis: {
                        categories: [
                            @foreach($mahasiswaProdi as $mhsP)
                                '{{ $mhsP ->nama }}',
                            @endforeach
                        ],
                        // categories: ['Informatika', 'Sistem Informasi'],
                        crosshair: true,
                        accessibility: {
                            description: 'Program Studi'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total Mahasiswa'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' (Mahasiswa)'
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                            name: 'Mahasiswa',
                            data: [ 
                                @foreach($mahasiswaProdi as $mhsP)
                                {{ $mhsP->jumlah }},
                            @endforeach]
                        }
                        // {
                        //     name: 'Wheat',
                        //     data: [51086, 136000, 5500, 141000, 107180, 77000]
                        // }
                    ]
                });
                // grafik jk
                Highcharts.chart('container-jk', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Jenis Kelamin Mahasiswa di Program Studi',
                        align: 'center'
                    },
                    subtitle: {
                        text: 'Source : Aplikasi Akademik',
                        align: 'center'
                    },
                    xAxis: {
                        categories: [
                            @foreach($mahasiswaJK as $mhsjk)
                                '{{ $mhsjk ->nama }}',
                            @endforeach
                        ],
                        // categories: ['Informatika', 'Sistem Informasi'],
                        crosshair: true,
                        accessibility: {
                            description: 'Program Studi'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total Mahasiswa'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' (Mahasiswa)'
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                            name: 'Laki_Lak',
                            data: [ 
                                @foreach($mahasiswaJK as $mhsjk)
                                {{ $mhsjk->Laki_Laki }},
                            @endforeach]
                        },
                        {
                            name: 'Perempuan',
                            data: [ 
                                @foreach($mahasiswaJK as $mhsjk)
                                {{ $mhsjk->Perempuan }},
                            @endforeach]
                        }
                        // {
                        //     name: 'Wheat',
                        //     data: [51086, 136000, 5500, 141000, 107180, 77000]
                        // }
                    ]
                });
            </script>

        </div>
    </div>
@endsection
