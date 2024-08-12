const cookieBox = document.querySelector(".wrapper"),
  buttons = document.querySelectorAll(".button");

const getCookie = (name) => {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
};

const executeCodes = () => {
  const cookieName = "Kaveesh";
  const cookieValue = getCookie(cookieName);

  if (cookieValue) {
    const [cookieDate, expirationTime] = cookieValue.split('|');
    const expirationDate = new Date(Number(expirationTime));

    if (expirationDate <= new Date()) {
      cookieBox.classList.add("show");
    }
  } else {
    cookieBox.classList.add("show");
  }

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      cookieBox.classList.remove("show");

      if (button.id === "acceptBtn") {
        const expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + 60 * 1000); // 1 minute
        document.cookie = `${cookieName}=accepted|${expirationDate.getTime()}; max-age=${60 * 60 * 24 * 30}`;
      }
    });
  });
};

window.addEventListener("load", executeCodes);
