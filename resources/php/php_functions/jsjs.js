function POST_VARIABLE_TO_PHP(url, wert){

  $.ajax({
    type: "POST",
    url: url,
    data: {data: wert},

  })
}
