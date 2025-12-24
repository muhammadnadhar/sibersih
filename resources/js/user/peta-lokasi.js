import { setOptions, importLibrary } from "@googlemaps/js-api-loader";
document.addEventListener("DOMContentLoaded", function () {
    // renderMap();
});

/// untuk render google map di tunda Hahulu
const renderMap = () => {
    const lokasiUser = document.querySelector("input[id=user-lokasi").value;

    console.info(lokasiUser);

    setOptions({
        key: "PAI KEY",
    });
};
