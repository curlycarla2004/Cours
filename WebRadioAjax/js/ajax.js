$(document).ready(  
    function() {
        $.ajax( {
            type: "GET",
            url: "status.xml",
            dataType: "xml",
            success: function(xml) {
                console.log(xml);
                $(xml).find('trackList').each( 
                    function() {
                        $(this).find('track').each(
                            function() {
                                var titrefull = $(this).find('title').text();
                                console.log(titrefull);
                                //titrefull = Oh Baby --- LCD Soundsystem

                                //je vais cherche ces caracters
                                var posDecoupe = titrefull.indexOf('---'); //=8 //or split
                                var titre = titrefull.substring(0, posDecoupe);
                                var group = titrefull.substring(posDecoupe+3, titrefull.length);
                                $('#titreencours').html(titre);
                                $('#groupencours').html(group);

                        }
                    )
                });
            }
        }); 

    
        var jqxhr = $.getJSON("playlist.php", function(data){
            $.each(data, function(i, item) {
            var myNewTr = '<section class="row border-top py-3"><div class="col-lg-9"><p class="titre font-weight-bold" name="titre">'+ item.titre + '</p>' + '<p class="artist" name="artist">'+ item.artist +'</p>' + '</div><div class="col-3"><p class="time" name="time">' + item.horaire + '</p></div></section>';
            //this above is what i have deleted  from my html
            $('#playlist').append(myNewTr);
            console.log(data);
            });
        
        });   
    });  

        //faire la meme chose que avec ajax change url for playlist.php dans le () on mets data et faire console log
            

        //$('recherceh)
    function search(variabledentree) {
        
        if (variabledentree.length > 2) {	///starting at 3 caracters we will search
            console.log(variabledentree);

            $.post('search.php', {
                recherche: variabledentree
            }, function(data) {
                var resultatenObject = JSON.parse(data);
                //vide la zone des resultats de recherche
                $('#resultatderecherche').html('');

                $.each(resultatenObject, function(i, item) {
                    var myNewTr = '<section class="row border-top py-3"><div class="col-lg-9"><p class="titre font-weight-bold" name="titre">'+ item.titre + '</p>' + '<p class="artist" name="artist">'+ item.artist +'</p>' + '</div><div class="col-3"><p class="time" name="time">' + item.horaire + '</p></div></section>';
                    //this above is what i have deleted  from my html
                    $('#resultatderecherche').append(myNewTr);
                
                });
            })
       
        } else(variabledentree) {
            console.log('pas de resultat');
        }
    }







        // var textBox = document.getElementById('search'),
	    // resultContainer = document.getElementById('display')

        // var ajax = null;
        // var loadedUsers = 0;


        // textBox.onkeyup = function() {
        //     var val = this.value;
        //     val = val.replace(/^\s|\s $/, "");
        
        //     if (val !== "") {	
        //         searchForData(val);
        //     } else {
        //         clearResult();
        //     }
        // }

        // function searchForData(value, isLoadMoreMode) {
        //     if (ajax && typeof ajax.abort === 'function') {
        //         ajax.abort(); // abort previous requests
        //     }
        
        //     if (isLoadMoreMode !== true) {
        //         clearResult();
        //     }
        
        //     ajax = new XMLHttpRequest();
        //     ajax.onreadystatechange = function() {
        //         if (this.readyState === 4 && this.status === 200) {
        //             try {
        //                 var json = JSON.parse(this.responseText)
        //             } catch (e) {
        //                 noUsers();
        //                 return;
        //             }
        
        //             if (json.length === 0) {
        //                 if (isLoadMoreMode) {
        //                     alert('No more to load');
        //                 } else {
        //                     noUsers();
        //                 }
        //             } else {
        //                 showUsers(json);
        //             }
        //         }
        //     }
        //     ajax.open('GET', 'search.php?username='   value   '&startFrom='   loadedUsers , true);
        //     ajax.send();
        // }








    // //Getting value from "ajax.php".
    // function fill(Value) {
    //     //Assigning value to "search" div in "search.php" file.
    //     $('#search').val(Value);
    //     //Hiding "display" div in "search.php" file.
    //     $('#display').hide();
    //  }
    //  $(document).ready(function() {
    //     //On pressing a key on "Search box" in "search.php" file. This function will be called.
    //     $("#search").keyup(function() {
    //         //Assigning search box value to javascript variable named as "name".
    //         var name = $('#livesearch').val();
    //         //Validating, if "name" is empty.
    //         if (name == "") {
    //             //Assigning empty value to "display" div in "search.php" file.
    //             $("#display").html("");
    //         }
    //         //If name is not empty.
    //         else {
    //             //AJAX is called.
    //             $.ajax({
    //                 //AJAX type is "Post".
    //                 type: "POST",
    //                 //Data will be sent to "ajax.php".
    //                 url: "search.php",
    //                 //Data, that will be sent to "ajax.php".
    //                 data: {
    //                     //Assigning value of "name" into "search" variable.
    //                     search: name
    //                 },
    //                 //If result found, this funtion will be called.
    //                 success: function(html) {
    //                     //Assigning result to "display" div in "search.php" file.
    //                     $("#display").html(html).show();
    //                 }
    //             });
    //         }
    //     });
    //  });



