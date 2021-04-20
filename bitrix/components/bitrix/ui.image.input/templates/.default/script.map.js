{"version":3,"sources":["script.js"],"names":["exports","main_core","main_core_events","main_loader","_templateObject","ImageInput","params","arguments","length","undefined","babelHelpers","classCallCheck","this","defineProperty","instanceId","containerId","loaderContainerId","settings","disabled","Event","bind","getContainer","event","stopPropagation","preventDefault","addImageHandler","addImage","editImageHandler","editImage","EventEmitter","subscribe","onUploaderIsInitedHandler","createClass","key","value","_this","_event$getCompatData","getCompatData","_event$getCompatData2","slicedToArray","id","uploader","getPreviews","Dom","addClass","getFileWrapper","requestAnimationFrame","getLoaderContainer","style","display","onFileIsDeletedHandler","onUploadStartHandler","onUploadDoneHandler","onFileCanvasIsLoadedHandler","recalculateWrapper","getInputInstance","BX","UI","FileInput","getInstance","getFileInput","agent","fileInput","container","document","getElementById","Type","isDomNode","Error","concat","fileWrapper","querySelector","loaderContainer","getAddButton","addButton","target","detail","inputInstance","items","getItems","hasOwnProperty","frameFlags","active","frameFiles","click","getLoader","loader","Loader","showLoader","setOptions","size","Math","min","offsetHeight","offsetWidth","show","hideLoader","hide","_this2","timeout","clearTimeout","setTimeout","_this3","_event$getCompatData3","_event$getCompatData4","stream","uploading","_this4","_event$getCompatData5","_event$getCompatData6","_this5","isMultipleInput","uploadParams","maxCount","buildShadowElement","wrapper","offsetParent","shadowElement","Tag","render","taggedTemplateLiteral","prepend","canvas","bottomMargin","height","width","closest","querySelectorAll","previews","unbind","removeClass","Reflection","namespace","window"],"mappings":"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","file":"script.map.js"}