fetch("http://172.20.0.3:3000/courses")
  .then((response) => response.json())
  .then((data) => {
    const cardsContainer = document.getElementById("courses_container");

    data.forEach((course) => {
      const cardWrapperElement = document.createElement("div");
      cardWrapperElement.className = "col-12 col-lg-6 p-3";
      const cardElement = document.createElement("div");
      cardElement.className = "card";

      const imgElement = document.createElement("img");
      imgElement.src = course.image_url; // replace with the actual source of your image
      imgElement.classList.add("card-img-top");

      const bodyElement = document.createElement("div");
      bodyElement.className = "card-body fs-5";

      const titleElement = document.createElement("h5");
      titleElement.className = "card-title fs-3 py-3";
      titleElement.textContent = course.name;

      const textElement = document.createElement("p");
      textElement.className = "card-text";
      textElement.textContent = course.desc;

      const btnElement = document.createElement("a");
      btnElement.href = "#";
      btnElement.className = "btn btn-primary btn-lg py-3";
      btnElement.textContent = "Buy Course";

      bodyElement.append(titleElement, textElement, btnElement);
      cardElement.append(imgElement, bodyElement);
      cardWrapperElement.appendChild(cardElement);
      cardsContainer.appendChild(cardWrapperElement);
    });
  });
