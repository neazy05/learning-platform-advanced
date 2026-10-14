function roleNumber() {
    for (var i = 1; i < 10; i++) {
        $role = $("#newUserRoleNameEn" + i);


        if (!$role.exists()) {
            alert('The num is' + i);
            return i;
        }
    }
}


$(document).ready(function () {

    $.fn.exists = function () {
        return this.length !== 0;
    }


    $("#listTutorCoursesForm").on('submit', function (event) {
        if (!($("#tutorLectures").length)) {
            event.preventDefault();
            alert('You Must choose a lecture!');
        }
    });
    $("#createNewLectureForm #newLectureType").on('change', function () {

        $type = $("#createNewLectureForm #newLectureType").val();

        $("#newLectureAttachmentGroup").remove();

        if ($type == "Video") {
            $group = $("<div class=\"form-group\" id='newLectureAttachmentGroup'></div>");
            $label = $("<label for=\"newLectureAttachment\" class=\"form-control-label\">Lecture Video URL:</label>\n");
            $input = $("<input type=\"text\" class=\"form-control\" id=\"newLectureAttachment\" name=\"newLectureAttachment\" required/>\n");
            $label.appendTo($group);
            $input.appendTo($group);

            $submit = $("#createNewLectureForm #newLectureSubmitGroup");
            $group.insertBefore($submit);
        } else {



            $group = $("<div class=\"form-group\" id='newLectureAttachmentGroup'></div>");
            $label = $("<label for=\"newLectureAttachment\" class=\"form-control-label\">Lecture File Select:</label>\n");

            $div = $(" <div class=\"file-loading\"></div>");
            $input = $("<input id=\"newLectureAttachment\" name=\"newLectureAttachment\" type=\"file\"/>\n");

            $input.appendTo($div);
            $label.appendTo($group);
            $div.appendTo($group);


          /*  $('#newLectureAttachment').fileinput({

                language: 'es',
                allowedFileExtensions: ['docx', 'pdf', 'pptx'],
                //allowedFileTypes: ['image','document'],
                maxFileSize: 5000

            });
*/
            $submit = $("#createNewLectureForm #newLectureSubmitGroup");

            $group.insertBefore($submit);






        }


    });



    $("#updateLectureForm #updateLectureType").on('change', function () {

        $type = $("#updateLectureForm #updateLectureType").val();

        $("#updateLectureAttachmentGroup").remove();

        if ($type == "Video") {
            $group = $("<div class=\"form-group\" id='updateLectureAttachmentGroup'></div>");
            $label = $("<label for=\"updateLectureAttachment\" class=\"form-control-label\">Lecture Video URL:</label>\n");
            $input = $("<input type=\"text\" class=\"form-control\" id=\"updateLectureAttachment\" name=\"updateLectureAttachment\" required/>\n");
            $label.appendTo($group);
            $input.appendTo($group);

            $submit = $("#updateLectureForm #updateLectureSubmitGroup");
            $group.insertBefore($submit);
        } else {



            $group = $("<div class=\"form-group\" id='updateLectureAttachmentGroup'></div>");
            $label = $("<label for=\"updateLectureAttachment\" class=\"form-control-label\">Lecture File Select:</label>\n");

            $div = $(" <div class=\"file-loading\"></div>");
            $input = $("<input id=\"updateLectureAttachment\" name=\"updateLectureAttachment\" type=\"file\"/>\n");

            $input.appendTo($div);
            $label.appendTo($group);
            $div.appendTo($group);


            /*  $('#newLectureAttachment').fileinput({

                  language: 'es',
                  allowedFileExtensions: ['docx', 'pdf', 'pptx'],
                  //allowedFileTypes: ['image','document'],
                  maxFileSize: 5000

              });
  */
            $submit = $("#updateLectureForm #updateLectureSubmitGroup");

            $group.insertBefore($submit);






        }


    });



    /*$("#uploadStudentAssignmentForm #newStudentAssignmentCourse").on('change', function () {

        $courseId = $(this).val();


                $("#uploadStudentAssignmentForm #studentAssignmentGroup").remove();

                $btn = $("#uploadStudentAssignmentSubmitGroup");

                $group = $("<div class=\"form-group\" id='studentAssignmentSelectionGroup'></div>");
                $label = $("<label for=\"studentAssignmentSelection\" class=\"form-control-label\">Select Which Assignment:</label>\n");

                $select=$("<select class='form-control' id='studentAssignmentSelection' name='studentAssignmentSelection'\n" +
                    "                            required></select>");

                for (var i = 0; i < data.assignments.length; i++) {

                    $op = $("<option  value='" + data.assignments[i].id + "'>" + data.assignments[i].title +"</option>");

                    $select.append($op);
                }

                $label.appendTo($group);

                $select.appendTo($group);

                $group.insertBefore($submit);


    });
*/


    $("#createAddLectureForm #coursesAvailable").on('change', function () {

        $courseId = $(this).val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: '/get_course_groups',
            success: function (data) {

                $("#createAddLectureForm #group_id,#createAddLectureForm #group_id_label").remove();
                $("#createAddLectureForm #coursesAvailable").find("option[value=' ']").remove();

                $btn = $("#submitCreateAddLectureDiv");

                $label = $("<p id='group_id_label'>Select Group:</p>");
                $select = $("<select class='custom-select' id='group_id' name='group_id'></select>");
                for (var i = 0; i < data.groups.length; i++) {

                    $op = $("<option  value='" + data.groups[i].id + "'>" + data.groups[i].course.course_en_name + "\\" +
                        data.groups[i].group_name + "\\" + data.groups[i].group_type.group_type_name + "</option>");

                    $select.append($op);
                }

                $label.insertBefore($btn);
                $select.insertBefore($btn);


            }
            ,
            data: {
                "course_id": $courseId
            }
            ,
            type: 'post',
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });

    });


});