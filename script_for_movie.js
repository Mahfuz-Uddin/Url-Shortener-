// api url =https://api.themoviedb.org/3/search/movie?query=(movieName)&api_key=66284d28433069de242f0f4a5d054488&language=en-US&page=1&include_adult=false


$(document).ready(function() {

    $("form").submit(compileMovies);
  
    function compileMovies(event) {
      event.preventDefault();
      obtainMovieInfo();
    };
     //Getting Api data 
    function obtainMovieInfo() {
      var name = $("input[name='title']").val();
      $.getJSON(
        // Authorizing the API
        "https://api.themoviedb.org/3/search/movie?query=" + name + "&api_key=66284d28433069de242f0f4a5d054488&language=en-US&page=1&include_adult=false",
        
        function(response) {
          console.log(response);
          
          // Getting the data from the API
          $(".movieData").show();
          
          // Getting the poster, title, description, release date, original language, rating, and voting count from the API
          $("#picture").html("<img src='https://image.tmdb.org/t/p/w500/" + response.results[0].poster_path + "'>");
          $("#title").html("<h3>" + response.results[0].title + "</h3>");
          $("#description").html("<p>" + response.results[0].overview + "</p>");
          $("#release_date").html("<p>Release Date: " + response.results[0].release_date + "</p>");
          $("#original_lang").html("<p>Original Language: " + response.results[0].original_language + "</p>");
          $("#rating").html("<p>Rating: " + response.results[0].vote_average + "</p>");
          $("#vote_count").html("<p>Votes: " + response.results[0].vote_count + "</p>");
        })
    }
  })