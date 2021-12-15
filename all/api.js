let title = document.querySelector(".title");
fetch("https://free-to-play-games-database.p.rapidapi.com/api/game?id=452", {
  method: "GET",
  headers: {
    "x-rapidapi-host": "free-to-play-games-database.p.rapidapi.com",
    "x-rapidapi-key": "1c0b50d2f6msh4c3a1fc430b57efp184f18jsncd6cebd5d7c0",
  },
})
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    title.innerHTML = data.title;
  })
  .catch((err) => {
    console.error(err);
  });