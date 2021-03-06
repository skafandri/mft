$(function() {
    //Story type selection
    $('.story-type').click(function(){
        $('.story-type').removeClass('btn-primary');
        $(this).addClass('btn-primary');
    });
    $('#cmd-story-new-options').click(function(){
        $('#div-story-new-options').toggle();
    });
    
    $.get(tagsUrl, function(data){
        tags = eval('('+data+')');
    });
    $('#story-new-tags').data('tags', []);
    
    $('#story-new-tags').autocomplete({
        source : function (request, response){
            var result = Array();
            var term = request.term.trim();
            console.log(term);
            for (var t in tags){
                if(tags[t].tag.toUpperCase().indexOf(term.toUpperCase()) === 0){
                    result.push({label:tags[t].tag, value:tags[t].id});
                }
            }
            response(result);
        },
        select: function(event, ui){
            var selectedTags = $(this).data('tags');
            selectedTags.push(ui.item);
            $(this).html('');
            for (var i in selectedTags){
                $(this).append(createTagUi(selectedTags[i]));
            }
            $(this).append("&nbsp;");
            return false;
        }
    });
});

function createTagUi(tag){
    var tagDiv = $('<div class="label label-default pull-left tag" contenteditable="false"></div>');
    var tagLabel = $('<span class="tag-label pull-left">'+tag.label+'</span>');
    var tagDelete = $('<span class="ui-icon ui-icon-close pull-left"></span>');
    tagDiv.append(tagLabel).append(tagDelete);
    return tagDiv;
}