const STORAGE_NAME = "CART";
const insertDomain = (domain) => {
    if(domain.name !== undefined && domain.where !== undefined){
        window.localStorage.setItem(STORAGE_NAME, JSON.stringify([domain]));
    }
};
const removeDomain = (domain) => {
    window.localStorage.setItem(STORAGE_NAME, JSON.stringify([]));
};
const getCartCount = () => {
    let cartJson = window.localStorage.getItem(STORAGE_NAME);
    let cart = Array.isArray(JSON.parse(cartJson))?JSON.parse(cartJson):[];
    return cart.length;
};
const resetCart = () => {
    window.localStorage.removeItem(STORAGE_NAME);
};
const getAllDomainJson = () => {
    let cartJson = window.localStorage.getItem(STORAGE_NAME);
    let cart = Array.isArray(JSON.parse(cartJson))?JSON.parse(cartJson):[];
    return cart;
}
const getFirstDomain = () => {
    let cartJson = window.localStorage.getItem(STORAGE_NAME);
    let cart = Array.isArray(JSON.parse(cartJson))?JSON.parse(cartJson):[];
    if(cart.length > 0){
        return cart[0];
    }else{
        return {};
    }
};