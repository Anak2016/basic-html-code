console.log('piss');
top10boys();
top10girls();

$("#search-id").on("change paste keyup", function () {
  var name = $(this).val();
  console.log(name);
  searchDB(name);
});

function top10boys() {

  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'getTop10Boys'
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);

    for (let index = 0; index < results.length; index++) {
      var babyname = results[index];
      console.log(babyname);
      $('#boys-names').append(
        '<li>' + babyname.name + ' votes: ' + babyname.votes + '</li>'
      );
    }
  });
}

function top10girls() {

  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'getTop10Girls'
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);

    for (let index = 0; index < results.length; index++) {
      var babyname = results[index];
      console.log(babyname);
      $('#girls-names').append(
        '<li>' + babyname.name + ' votes: ' + babyname.votes + '</li>'
      );
    }
  });
}


function searchDB(name) {

  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'searchBabyName',
      name: name
    },
    dataType: "json"
  }).done(function(results) {
    console.log('done with post');
    console.log(results);

    for (let index = 0; index < 5; index++) {
      var babyname = results[index];
      console.log(babyname);
      $('#searched-names').append(
        '<li>' + babyname.name + ' votes: ' + babyname.votes + '</li>'
      );
    }
  });
}



$("#create-table").click(function(e) {
  e.preventDefault();
  console.log('create table');
  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'createBabyTable' 
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);
  });
});

$("#seed-file").click(function(e) {
  e.preventDefault();
  console.log('ssed file');
  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'goThroughFile'
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);
  });
});

$("#seed-dumb").click(function(e) {
  e.preventDefault();
  console.log('seed dumb');
  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'seedBabyNamesTable'
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);
  });
});

$("#delete-table").click(function(e) {
  e.preventDefault();
  console.log('delete table');
  $.ajax({
    method: "POST",
    url: "./router.php",
    data: { 
      function: 'deleteBabyTable'
    },
    dataType: "json"
  }).done(function(results) {
    console.log(results);
  });
});
