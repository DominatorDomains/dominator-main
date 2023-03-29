const TextEditor = (textField) => {
  // const style =
  let fontSize = window
    .getComputedStyle(textField, null)
    .getPropertyValue("font-size");
  fontSize = fontSize && parseInt(fontSize) ? parseInt(fontSize) : 18;
  console.log("initial size ", fontSize);

  const increaseFontSize = () => {
    fontSize++;
    textField.style.fontSize = fontSize + "px";
  };
  const decreaseFontSize = () => {
    fontSize--;
    textField.style.fontSize = fontSize + "px";
  };
  const changeFontFamily = (value) => {
    textField.style.fontFamily = value;
  };
  const changeColor = (color) => {
    textField.style.color = color;
  };
  const setItalic = (isTrue = true) => {
    textField.style.fontStyle = isTrue ? "italic" : "";
  };
  const setUnderline = (isTrue = true) => {
    textField.style.textDecoration = isTrue ? "underline" : "";
  };
  const getFontString = () => {
    let fontStr = "";
    fontStr == textField.style.fontSize + "px " + textField.style.fontFamily + " " + textField.style.fontStyle + " " ;
    return fontStr;
  };
  const getFontColor = () => {
    return textField.style.color;
  };

  return {
    increaseFontSize,
    decreaseFontSize,
    changeFontFamily,
    setItalic,
    setUnderline,
    changeColor,
  };
};

const nftBg = document.querySelector("#nftBg");
const nftFrame = document.querySelector("#nftFrame");
const nftText = document.querySelector("#nftText");
const editor = TextEditor(nftText);

const colorBtn = document.querySelector("#colorBtn");
const italicBtn = document.querySelector("#italicBtn");
const fontFamily = document.querySelector("#fontFamily");
const increaseBtn = document.querySelector("#increaseBtn");
const decreaseBtn = document.querySelector("#decreaseBtn");
const underlineBtn = document.querySelector("#underlineBtn");
const bgButtons = document.querySelectorAll("[data-event='changeBg']");
const frameButtons = document.querySelectorAll("[data-event='changeFrame']");

increaseBtn.onclick = () => editor.increaseFontSize();
decreaseBtn.onclick = () => editor.decreaseFontSize();
fontFamily.onchange = ({ target }) => editor.changeFontFamily(target.value);
italicBtn.onclick = ({ target }) => {
  target.classList.toggle("checked");
  editor.setItalic(target.classList.contains("checked"));
};
underlineBtn.onclick = ({ target }) => {
  target.classList.toggle("checked");
  editor.setUnderline(target.classList.contains("checked"));
};

var picker = new Picker({
  parent: colorBtn,
  color: "rgb(209, 230, 93)",
  popup: "bottom",
  onOpen: () => {
    colorBtn.classList.add("active");
  },
  onClose: () => {
    colorBtn.classList.remove("active");
  },
  onChange: (color) => {
    editor.changeColor(color.rgbaString);
  },
});

bgButtons.forEach((btn) => {
  btn.onclick = () => {
    bgButtons.forEach((item) => item.classList.remove("active"));
    const img = btn.getAttribute("data-img");
    nftBg.src = img;
    btn.classList.add("active");
  };
});
frameButtons.forEach((btn) => {
  btn.onclick = () => {
    frameButtons.forEach((item) => item.classList.remove("active"));
    const img = btn.getAttribute("data-img");
    nftFrame.src = img;
    btn.classList.add("active");
  };
});
