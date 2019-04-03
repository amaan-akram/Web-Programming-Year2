 $(document).ready(function(){
            $("#button").click(function(){
                
                var URL = "http://www.omdbapi.com/?apikey=2b4f0733&t=";
                var input = document.getElementsByName('search1')[0].value;
                var URL = URL + input;
                
                $.getJSON(URL).then(function(response){
                    var title = response.Title;
                    var image = response.Poster;
                    document.getElementById("output").innerHTML = title;
                    $('img').attr('src',image)
                });
            });
        });