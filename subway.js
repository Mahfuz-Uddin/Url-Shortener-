// console.log('is jquery here?', $);
var trains = ["1", "2", "3", "4", "5", "6", "A", "C", "E", "B", "D", "F", "M", "N", "Q", "R", "W", "J", "Z", "G", "L", "S" ]
$(document).ready(function() {
    $.ajax({
        url: "https://data.cityofnewyork.us/resource/kk4q-3rt2.json",
        type: "GET",
        data: {
            "$limit": 5000,
            "$$app_token": "GFM7yJOMboJWrRvx7JCKefRKb"
        }
    }).done(function(data) {
        //   alert("Retrieved " + data.length + " records from the dataset!");

        var trainData = {
            "1": {
                "stops": []
            }
        }
        var colorTrain = {
            "1": "red",
            "2": "red",
            "3": "red",
            "9": "red",
            "4": "green",
            "5": "green",
            "6": "green",
            "A": "blue",
            "C": "blue",
            "E": "blue",
            "B": "orange",
            "D": "orange",
            "F": "orange",
            "M": "orange",
            "N": "yellow",
            "Q": "yellow",
            "R": "yellow",
            "W": "yellow",
            "J": "brown",
            "Z": "brown",
            "G": "lightgreen",
            "L": "grey",
            "S": "lightblack"
        }


        window.mydata = data;
        var line = 0;
        var name = 0;
        console.log("before loop")
        for (var i = 0; i < window.mydata.length; i++) {
            console.log(window.mydata[i]);
            var line = window.mydata[i].line
            console.log(line);
            var lines = line.split("-");
            console.log("line is " + lines);
            for (var j = 0; j < lines.length; j++) {
                if (trainData[lines[j]]) {
                    trainData[lines[j]]["stops"].push(window.mydata[i].name);
                }
                else {
                    trainData[lines[j]] = {};
                    trainData[lines[j]]["stops"] = [window.mydata[i].name];
                }
                console.log(trainData[lines[j]]);
            }
            console.log("This is ", trainData)
        }

        // for (var i = 0; i < window.mydata.length; i++) {
        //   var name = window.mydata[i].name
        //   console.log("station is");
        //   console.log(name);
        // }





        console.log("after loop")



        for (var i = 0; i < trains.length; i++) {
            console.log(" i " + i)
            console.log("trains[i] " + trains[i])
            console.log("train color = " + colorTrain[trains[i]])

            var circleHtml =
                '<a class="btn1 ' + colorTrain[trains[i]] + '" id="' + trains[i] + '" href="#">' +
                '<div class="circle">' + trains[i] + '</div>' +
                '<i class="ion-ios-arrow-down">' +
                '</i>' +
                '</a>';
            $("#all").append(circleHtml);
        }

        $(".btn1").click(function() {
            // $( "#book" ).fadeIn( "slow", function()
            //   var data = $(this).ajax('url');
            $("#results").text("Hello world!");
            var list = "";
            var results = trainData[$(this).attr("id")].stops;
            for (var i = 0; i < results.length; i++) {
                list += "<li>"+ "<a target='_blank' href=\"https://www.google.com/search?q=" + results[i] + "\"> "+ results[i] + "</a>" + "</li>";
            }
            console.log("results are "+ list);

            $('.results').html(list);
        })
    });



})