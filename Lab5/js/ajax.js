 $(document).ready(function(){
            $("#button").click(function(){
                
                var URL = "http://www.omdbapi.com/?apikey=2b4f0733&t=";
                var input = document.getElementsByName('search1')[0].value;
                var URL = URL + input;
                
                $.getJSON(URL).then(function(response){
                    console.log(response);
                    if (response.Response == "False"){
                      
                     $('img').attr('src',"#") 
                        document.getElementById("info").innerHTML ="";
                        document.getElementById("output").innerHTML = "Error Please Try Again :("
                        $('iframe').attr('src',"")
                    
                    }
                    else{
                       var title = response.Title + " ";
		            var year = response.Year;
                    var image = response.Poster;
		            var plot = response.Plot;
                    var trailer = "https://www.youtube.com/embed?listType=search&list=" + title + "trailer";
                    document.getElementById("output").innerHTML = title + year;
                    $('img').attr('src',image)
		            document.getElementById("info").innerHTML = "<br>" + plot;
                    $('iframe').attr('src',trailer)
                    }
                });
            });
        });