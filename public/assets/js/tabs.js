const tabEvents = document.querySelectorAll(".tabEvent");
tabEvents.forEach((tabEvent) => {
  tabEvent.onclick = () => {
    tabEvents.forEach((item) => {
      if (item !== tabEvent) item.parentElement.classList.remove("active");
    });
    tabEvent.parentElement.classList.toggle("active");
  };
});
