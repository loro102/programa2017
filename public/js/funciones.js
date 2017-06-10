/**
 * Created by alvaro on 30/05/17.
 */
/*--------------------------------------------------------------------------------------------------------------------
| @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -
| @ Los valores de las cuantias del cliente y de la indemnizacion se rellenan automaticamente                       @ -
| @  cuando se escribe en la cuantía de factura                                                                     @ -
| @                                                                                                                 @ -
| @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -
-----------------------------------------------------------------------------------------------------------------------
 */
function cuantias()
{
    document.getElementById("cuantia_cliente").value = document.getElementById("cuantia_factura").value;
    document.getElementById("cuantia_indemnizacion").value = document.getElementById("cuantia_factura").value;
}

/*--------------------------------------------------------------------------------------------------------------------
 | @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -
 | @ Cuando en la url aparece # para enlazar una url a una pestaña esto lo hace correctamente                        @ -
 | @  cuando se escribe en la cuantía de factura                                                                     @ -
 | @                                                                                                                 @ -
 | @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -
 -----------------------------------------------------------------------------------------------------------------------
 */
(function activateTabFromHash() { if (location.hash) { var tabLink = document.querySelector('a[href="' + location.hash + '"]'); if (!tabLink) { return false; } tabLink.click(); if (location.hash) {
    setTimeout(function() {
        window.scrollTo(0, 0);
    }, 1);
} } })();