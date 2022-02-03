<style>
    .square:before {
        content:"";
        position: absolute;
        left: 13px;
        top: -10px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #fffffffb transparent;
        /* z-index:9999; */
    }
    .square:after {
        content:"";
        position: absolute;
        left: 10px;
        top: -14px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 17px 17px 17px;
        border-color: transparent transparent #fffffffb transparent;
        /* z-index:9998; */
    }
    .square {
        background: #fffffffb;
        border: 8px solid #fffefe;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
        float: right;
        position: absolute;
        margin: 0;
        top: 1.8em;
        width: 200px;
        /* z-index: 99999; */
    }
</style>