
/*
var percentageComplete = 0.9;
var strokeDashOffsetValue = 100 - (percentageComplete * 100);
var progressBar = $(".js-progress-bar");
progressBar.css("stroke-dashoffset", strokeDashOffsetValue);

 */

function setPercentageComplete( percentageComplete = 0, progress_id = null ) {
  var progressBar = $("#"+progress_id);
  var strokeDashOffsetValue = 100 - percentageComplete;
  progressBar.css("stroke-dashoffset", strokeDashOffsetValue);
  return false
}
