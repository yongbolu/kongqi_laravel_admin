//增加设置标签H1-H6


function SimpleToggleHeading(editor, size, direction) {
    var cm = editor.codemirror;
    if (/editor-preview-active/.test(cm.getWrapperElement().lastChild.className))
        return;
    var startPoint = cm.getCursor("start");
    var endPoint = cm.getCursor("end");
    for (var i = startPoint.line; i <= endPoint.line; i++) {
        (function (i) {
            var text = cm.getLine(i);
            var currHeadingLevel = text.search(/[^#]/);
            console.log(currHeadingLevel);


            if (direction !== undefined) {
                if (currHeadingLevel <= 0) {
                    if (direction == "bigger") {
                        text = "###### " + text;
                    } else {
                        text = "# " + text;
                    }
                } else if (currHeadingLevel == 6 && direction == "smaller") {
                    text = text.substr(7);
                } else if (currHeadingLevel == 1 && direction == "bigger") {
                    text = text.substr(2);
                } else {
                    if (direction == "bigger") {
                        text = text.substr(1);
                    } else {
                        text = "#" + text;
                    }
                }
            } else {
                if (size == 1) {
                    if (currHeadingLevel <= 0) {
                        text = "# " + text;
                    } else if (currHeadingLevel == size) {
                        text = text.substr(currHeadingLevel + 1);
                    } else {
                        text = "# " + text.substr(currHeadingLevel + 1);
                    }
                } else if (size == 2) {
                    if (currHeadingLevel <= 0) {
                        text = "## " + text;
                    } else if (currHeadingLevel == size) {
                        text = text.substr(currHeadingLevel + 1);
                    } else {
                        text = "## " + text.substr(currHeadingLevel + 1);
                    }
                } else {
                    if (currHeadingLevel == size) {
                        text = text.substr(currHeadingLevel + 1);
                    } else {

                        text = _repeatStringNumTimes("#", size) + " " + text.substr(currHeadingLevel + 1);
                    }
                }
            }

            cm.replaceRange(text, {
                line: i,
                ch: 0
            }, {
                line: i,
                ch: 99999999999999
            });
        })(i);
    }
    cm.focus();
}

function _repeatStringNumTimes(str, num) {
    let repeatStr = '';
    for (let i = 0; i < num; i++) {
        repeatStr += str;
    }
    return repeatStr;
}


function SimpletoggleAlignment(editor, type) {
    if (/editor-preview-active/.test(editor.codemirror.getWrapperElement().lastChild.className))
        return;

    end_chars = '';
    var cm = editor.codemirror;

    type = type || 'left';
    var text;
    var start = '';
    var end = '';

    var startPoint = cm.getCursor("start");
    var endPoint = cm.getCursor("end");
    text = cm.getSelection();
    //判断是否存在
    var p_reg = /\<p\s.*?\>(.*)\<\/p\>/;
    if (p_reg.test(text)) {
        //已经存在了。
        text = cm.getLine(startPoint.line);
        start = text.slice(0, startPoint.ch);
        end = text.slice(startPoint.ch);
        end = end.replace(/\<p\s.*?\>/, "");
        end = end.replace(/\<\/p\>/, "");

        cm.replaceRange(start + end, {
            line: startPoint.line,
            ch: 0
        }, {
            line: startPoint.line,
            ch: 99999999999999
        });


    } else {
        if (type == 'left') {
            text = "<p align=\"left\">" + text + "</p>";
        }
        if (type == 'center') {
            text = "<p align=\"center\">" + text + "</p>";
        }
        if (type == 'right') {
            text = "<p align=\"right\">" + text + "</p>";
        }

        cm.replaceSelection(start + text + end);
        endPoint.ch = startPoint.ch + text.length;
    }


    cm.setSelection(startPoint, endPoint);
    cm.focus();


}

function SimpletoggleSideBySide(editor) {
    var cm = editor.codemirror;
    var wrapper = cm.getWrapperElement();
    var preview = wrapper.nextSibling;
    var toolbarButton = editor.toolbarElements["side-by-side"];
    var useSideBySideListener = false;
    if (/editor-preview-active-side/.test(preview.className)) {
        preview.className = preview.className.replace(
            /\s*editor-preview-active-side\s*/g, ""
        );
        toolbarButton.className = toolbarButton.className.replace(/\s*active\s*/g, "");
        wrapper.className = wrapper.className.replace(/\s*CodeMirror-sided\s*/g, " ");

    } else {
        // When the preview button is clicked for the first time,
        // give some time for the transition from editor.css to fire and the view to slide from right to left,
        // instead of just appearing.
        setTimeout(function () {
            //if(!cm.getOption("fullScreen"))
            //toggleFullScreen(editor);
            preview.className += " editor-preview-active-side";
        }, 1);
        toolbarButton.className += " active";
        wrapper.className += " CodeMirror-sided";
        useSideBySideListener = true;


        //判断是否全屏
        if (!cm.getOption("fullScreen")) {

            $(".editor-preview-side").css({
                position: 'absolute',
                top: '51px',
                right: '10px',
                width: '49%'
            })

        } else {

            $(".editor-preview-side").css({
                position: 'fixed',
                top: '130px',
                right: '0px',
                width: '50%'
            })

        }

    }

    // Hide normal preview if active
    var previewNormal = wrapper.lastChild;
    if (/editor-preview-active/.test(previewNormal.className)) {
        previewNormal.className = previewNormal.className.replace(
            /\s*editor-preview-active\s*/g, ""
        );
        var toolbar = editor.toolbarElements.preview;
        var toolbar_div = wrapper.previousSibling;
        toolbar.className = toolbar.className.replace(/\s*active\s*/g, "");
        toolbar_div.className = toolbar_div.className.replace(/\s*disabled-for-preview*/g, "");

    }

    var sideBySideRenderingFunction = function () {
        preview.innerHTML = editor.options.previewRender(editor.value(), preview);
    };

    if (!cm.sideBySideRenderingFunction) {
        cm.sideBySideRenderingFunction = sideBySideRenderingFunction;
    }

    if (useSideBySideListener) {
        preview.innerHTML = editor.options.previewRender(editor.value(), preview);
        cm.on("update", cm.sideBySideRenderingFunction);
    } else {
        cm.off("update", cm.sideBySideRenderingFunction);
    }

    // Refresh to fix selection being off (#309)
    cm.refresh();
}

function SimpletogglePager(editor) {
    var start = '';
    var end = '';
    var cm = editor.codemirror;
    var startPoint = cm.getCursor("start");
    var endPoint = cm.getCursor("end");
    text = cm.getSelection();
    var p_reg = /\[kq_page\]/;
    if (p_reg.test(text)) {
        text = cm.getLine(startPoint.line);
        start = text.slice(0, startPoint.ch);
        end = text.slice(startPoint.ch);
        end = end.replace(p_reg, "");
        cm.replaceRange(start + end, {
            line: startPoint.line,
            ch: 0
        }, {
            line: startPoint.line,
            ch: 99999999999999
        });
    } else {
        text = '[kq_page]';
        cm.replaceSelection(start + text + end);
        endPoint.ch = startPoint.ch + text.length;
    }
    cm.setSelection(startPoint, endPoint);
    cm.focus();
}

function SimpleDrawImg(editor) {
    var cm = editor.codemirror;


    console.log('加载图片');
    layui.use(['index', 'uploader'], function () {
        var uploader = layui.uploader;

        uploader.place_editor('image', 1, function (html) {

            cm.replaceSelection(html);
        }, 1)
    });


}