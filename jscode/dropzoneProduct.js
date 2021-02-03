Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
    maxFilesize: 2,
    url: url + "upload.php",
    dataType: 'json',
    success: function(file, response) {
        if (response.file != null) {
            var link = 'upload/patientDocs/' + response.file;
            var anchorEl = document.createElement('a');
            anchorEl.setAttribute('href', link);
            anchorEl.setAttribute('target', '_blank');
            anchorEl.innerHTML = "<i class='fa fa-download' aria-hidden='true'></i>";
            file.previewTemplate.appendChild(anchorEl);
        }
    },
    init: function() {
        thisDropzone = this;
        var link = url + 'getImages.php';
        $.post(link, {
            patientId: global_patientId
        }, function(response) {
            if (response.Data != null) {
                var a;
                $.each(response.Data, function(key, value) {
                    var mockFile = {
                        name: value.name,
                        size: value.size
                    };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.createThumbnailFromUrl(mockFile, "upload/patientDocs/" + value.name);
                    thisDropzone.emit("complete", mockFile);

                    a = document.createElement('a');
                    a.setAttribute('href', "upload/patientDocs/" + value.name);
                    a.setAttribute('target', '_blank');
                    a.innerHTML = "<i class='fa fa-download' aria-hidden='true'>Download</i>";
                    mockFile.previewTemplate.appendChild(a);

                });
            }

        });
    },
    addRemoveLinks: true,
    removedfile: function(file) {
        var name = file.name;
        $.ajax({
            type: 'POST',
            url: url + 'upload.php',
            data: {
                name: name,
                request: 2,
                patientId: global_patientId
            },
            sucess: function(data) {
                console.log('success: ' + data);
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});