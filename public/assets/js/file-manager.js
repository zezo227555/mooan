
    /* semi circular gauge */
    var options = {
        series: [76],
        chart: {
            type: 'radialBar',
            height: 300,
            offsetY: -20,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: {
                    background: "#fff",
                    strokeWidth: '75%',
                    margin: 5, // margin is in pixels
                    dropShadow: {
                        enabled: false,
                        top: 2,
                        left: 0,
                        color: '#999',
                        opacity: 1,
                        blur: 2
                    }
                },
                dataLabels: {
                    name: {
                        show: false
                    },
                    value: {
                        offsetY: -2,
                        fontSize: '22px'
                    }
                }
            }
        },
        colors: ["#525ce5"],
        grid: {
            padding: {
                top: -10
            }
        },
        labels: ['Average Results'],
    };
    var chart = new ApexCharts(document.querySelector("#storage-usage"), options);
    chart.render();
    
  function storage_usage() {
    chart1.updateOptions({
      colors: ["rgb(" + myVarVal + ")"],
    })
  }


    /**** Filepond js****/
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginImageEdit
    );

    const MultipleElement = document.querySelector('.multiple-filepond');
    FilePond.create(MultipleElement,);