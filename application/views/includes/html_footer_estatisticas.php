<script>
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        greenish: 'rgb(23, 128, 128)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    function saveStatsPDF(fileFirstName,fileMiddleName,divPrincipal="estatisticas") {
        var nome = fileFirstName.concat("_",fileMiddleName,"_estatisticas.pdf");

        window.scrollTo(0,0); 
        var HTML_Width = $("#"+divPrincipal).width();
        var HTML_Height = $("#"+divPrincipal).height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($("#"+divPrincipal)[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/pdf", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'PDF', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'PDF', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        
        pdf.save(nome);
        });
    }

    function showStatistics(id_oferecimento, divEstatisticas, papel){

      divEstatisticas.innerText = "";
      
      $.post("<?php echo site_url('estatistica/getDadosEstatistica/');?>", {id_oferecimento:id_oferecimento, papel_desejado:papel},
        function(data, status) {
          var matrizEstatistica = JSON.parse(data);
          if(matrizEstatistica == null){
            var textoSemValores = document.createElement('h2');
            textoSemValores.innerHTML = "Ainda não temos respostas para gerar estatísticas";
            divEstatisticas.appendChild(textoSemValores);
          }else{
            for (let key in matrizEstatistica){
              if(matrizEstatistica[key]['tipo'] == 2 || matrizEstatistica[key]['tipo'] == 4 || matrizEstatistica[key]['tipo'] == 6){
                var divGrafico = criarDivGrafico(matrizEstatistica[key]['id_formularios_campos'], matrizEstatistica[key]['nome'], matrizEstatistica[key]['estatistica'], matrizEstatistica[key]['opcao']);
                divEstatisticas.appendChild(divGrafico);
              }else{
                console.log(matrizEstatistica[key]);
                var divRespostas = criarDivTexto(matrizEstatistica[key]['id_formularios_campos'], matrizEstatistica[key]['nome'], matrizEstatistica[key]['valor']);
                divEstatisticas.appendChild(divRespostas);
              }
            }
          }
        });
    }

    function criarDivGrafico(id_pergunta, pergunta, estatistica, alternativa){
        var divColuna = document.createElement('DIV');
        divColuna.setAttribute("class", "col-md-12");
        var divCard = document.createElement('DIV');
        divCard.setAttribute("class", "card");
        var divCardHeader = document.createElement('DIV');
        divCardHeader.setAttribute("class", "card-header");
        var divCardTitle = document.createElement('DIV');
        divCardTitle.setAttribute("class", "card-title");
        divCardTitle.innerHTML = pergunta;
        var divCardBody = document.createElement('DIV');
        divCardBody.setAttribute("class", "card-body");
        var divChartContainer = document.createElement('DIV');
        divChartContainer.setAttribute("class", "chart-container");
        var divCSM = document.createElement('DIV');
        divCSM.setAttribute("class", "chartjs-size-monitor");
        divCSM.setAttribute("style", "position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;");
        var divCSME = document.createElement('DIV');
        divCSME.setAttribute("class", "chartjs-size-monitor-expand");
        divCSME.setAttribute("style", "position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;");
        var divCSMS = document.createElement('DIV');
        divCSMS.setAttribute("class", "chartjs-size-monitor-shrink");
        divCSMS.setAttribute("style", "position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;");    
        var divStyle1 = document.createElement('DIV');
        divStyle1.setAttribute("style", "position:absolute;width:1000000px;height:1000000px;left:0;top:0;");
        var divStyle2 = document.createElement('DIV');
        divStyle2.setAttribute("style", "position:absolute;width:200%;height:200%;left:0; top:0;");
        var canvas = document.createElement('canvas');
        canvas.setAttribute("style", "width: 380px; height: 300px; display: block;");
        canvas.setAttribute("width", "760");
        canvas.setAttribute("height", "600");
        canvas.setAttribute("class", "chartjs-render-monitor");
        canvas.setAttribute("id", "chart_" + id_pergunta);

        //Unir as divs
        divCSMS.appendChild(divStyle2);
        divCSME.appendChild(divStyle1);
        divCSM.appendChild(divCSME);
        divCSM.appendChild(divCSMS);
        divChartContainer.appendChild(divCSM);
        divChartContainer.appendChild(canvas);
        divCardBody.appendChild(divChartContainer);
        divCardHeader.appendChild(divCardTitle);
        divCard.appendChild(divCardHeader);
        divCard.appendChild(divCardBody);
        divColuna.appendChild(divCard);

        var pieChart = canvas.getContext('2d');
        var color = Chart.helpers.color;
        alternativa = alternativa.split(';') ;
        var graficoPergunta = new Chart(pieChart, {
        type: 'pie',
        data: {
            datasets: [{
                data: estatistica,
                backgroundColor :[window.chartColors.green,window.chartColors.greenish,window.chartColors.orange, window.chartColors.red],
                borderWidth: 0
            }],
            labels: alternativa
        },
        options : {
            responsive: true, 
            maintainAspectRatio: false,
            legend: {
                position : 'bottom',
                labels : {
                    fontColor: 'rgb(154, 154, 154)',
                    fontSize: 11,
                    usePointStyle : true,
                    padding: 20
                }
            },
            pieceLabel: {
                render: 'percentage',
                fontColor: 'white',
                fontSize: 14,
            },
            tooltips: false,
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
        });

        return divColuna;
    }

    function criarGraficoBarras(id_pergunta, pergunta, dominios, verde, amarelo, vermelho){
        var divColuna = document.createElement('DIV');
        divColuna.setAttribute("class", "col-md-12");
        var divCard = document.createElement('DIV');
        divCard.setAttribute("class", "card");
        var divCardHeader = document.createElement('DIV');
        divCardHeader.setAttribute("class", "card-header");
        var divCardTitle = document.createElement('DIV');
        divCardTitle.setAttribute("class", "card-title");
        divCardTitle.innerHTML = pergunta;
        var divCardBody = document.createElement('DIV');
        divCardBody.setAttribute("class", "card-body");
        var divChartContainer = document.createElement('DIV');
        divChartContainer.setAttribute("class", "chart-container");
        var divCSM = document.createElement('DIV');
        divCSM.setAttribute("class", "chartjs-size-monitor");
        divCSM.setAttribute("style", "position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;");
        var divCSME = document.createElement('DIV');
        divCSME.setAttribute("class", "chartjs-size-monitor-expand");
        divCSME.setAttribute("style", "position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;");
        var divCSMS = document.createElement('DIV');
        divCSMS.setAttribute("class", "chartjs-size-monitor-shrink");
        divCSMS.setAttribute("style", "position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;");    
        var divStyle1 = document.createElement('DIV');
        divStyle1.setAttribute("style", "position:absolute;width:1000000px;height:1000000px;left:0;top:0;");
        var divStyle2 = document.createElement('DIV');
        divStyle2.setAttribute("style", "position:absolute;width:200%;height:200%;left:0; top:0;");
        var canvas = document.createElement('canvas');
        canvas.setAttribute("style", "width: 380px; height: 300px; display: block;");
        canvas.setAttribute("width", "760");
        canvas.setAttribute("height", "600");
        canvas.setAttribute("class", "chartjs-render-monitor");
        canvas.setAttribute("id", "chart_" + id_pergunta);

        //Unir as divs
        divCSMS.appendChild(divStyle2);
        divCSME.appendChild(divStyle1);
        divCSM.appendChild(divCSME);
        divCSM.appendChild(divCSMS);
        divChartContainer.appendChild(divCSM);
        divChartContainer.appendChild(canvas);
        divCardBody.appendChild(divChartContainer);
        divCardHeader.appendChild(divCardTitle);
        divCard.appendChild(divCardHeader);
        divCard.appendChild(divCardBody);
        divColuna.appendChild(divCard);

        var multipleBarChart = canvas.getContext('2d');
        var color = Chart.helpers.color;

        var myMultipleBarChart = new Chart(multipleBarChart, {
            type: 'bar',
            data: {
                labels: dominios,
                datasets : [{
                    label: "Verde",
                    backgroundColor: '#46D24A',
                    borderColor: '#46D24A',
                    data: verde,
                },{
                    label: "Amarelo",
                    backgroundColor: '#FFB559',
                    borderColor: '#FFB559',
                    data: amarelo,
                }, {
                    label: "Vermelho",
                    backgroundColor: '#F36A71',
                    borderColor: '#F36A71',
                    data: vermelho,
                }],
            },
            options: {
                responsive: true, 
                maintainAspectRatio: false,
                legend: {
                    position : 'bottom'
                },
                title: {
                    display: true,
                    text: pergunta
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                        
                    }],
                    yAxes: [{
                        stacked: true, 
                        ticks: {
                            stepSize: 1
                        }
                                       
                    }]
                },
                parsing: false
            }
        });
        return divColuna;
    }

    function criarDivTexto(id_pergunta, pergunta, respostas){
        var divColuna = document.createElement('DIV');
        divColuna.setAttribute("class", "col-md-12");
        var divCard = document.createElement('DIV');
        divCard.setAttribute("class", "card");
        var divCardHeader = document.createElement('DIV');
        divCardHeader.setAttribute("class", "card-header");
        var divCardTitle = document.createElement('DIV');
        divCardTitle.setAttribute("class", "card-title");
        divCardTitle.innerHTML = pergunta;
        var divCardBody = document.createElement('DIV');
        divCardBody.setAttribute("class", "card-body");
        
        if (Array.isArray(respostas)){
            for (let key in respostas){
                var divResposta = document.createElement('h4');
                divResposta.innerHTML = respostas[key];
                divCardBody.appendChild(divResposta);
            }
        }else{
            var divResposta = document.createElement('h4');
            divResposta.innerHTML = respostas;
            divCardBody.appendChild(divResposta);
        }
        
        //Unir as divs
        divCardHeader.appendChild(divCardTitle);
        divCard.appendChild(divCardHeader);
        divCard.appendChild(divCardBody);
        divColuna.appendChild(divCard);


        return divColuna;
    }

    function saveRelatorioDisciplina(relatorioNome,divPrincipal="relatorioDisciplina") {
        //var nome = "Relatorio_"+relatorio_id+fileMiddleName+".pdf";

        window.scrollTo(0,0); 
        var HTML_Width = $("#"+divPrincipal).width();
        var HTML_Height = $("#"+divPrincipal).height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($("#"+divPrincipal)[0]).then(function (canvas) {
            
        var imgData = canvas.toDataURL("image/pdf", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'PDF', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'PDF', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        
        //pdf.save(nome);
        nameChosen = "Relatorio_".concat(relatorioNome);
        var url = "<?php echo site_url('offerings/addNewDocument/');?>";
        var url = String(url+'.pdf/'+nameChosen+'/'+"NULL"+'/'+'relatorios');
        
        var formData = btoa(pdf.output()); 
        
        $.ajaxSetup({async:false});
        $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            url: url,
            data: formData,
            processData: false, // impedir que o jQuery tranforma a "data" em querystring
            contentType: false, // desabilitar o cabeçalho "Content-Type"
            cache: false, // desabilitar o "cache"
            //timeout: 600000, // definir um tempo limite (opcional)
            //contentType: "application/json; charset=utf-8",
            // manipular o sucesso da requisição
            success: function (data) {
            },
            // manipular erros da requisição
            error: function (e) {
            }
        });
        });
        
        
    }
</script>