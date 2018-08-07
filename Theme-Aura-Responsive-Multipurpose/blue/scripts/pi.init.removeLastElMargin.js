jQuery(function($){

	//region Remove Last Header Element Margin
	var $w = $(window),
		$hrs = $('.pi-section-header'),
		clsFloatRight = 'pi-pull-right',
		clsHeaderBlock = 'pi-row-block',
		tmt,
		hrObjects = [];

	$hrs.each(function(){
		var $curHr = $(this),
			$blocks = $curHr.find('.' + clsHeaderBlock).filter('.' + clsFloatRight);
		hrObjects.push({
			$hr: $curHr,
			$blocks: $blocks,
			currentBlock: false
		});
	});

	function checkHeaderBlocks(){
		for (var i = 0; i < hrObjects.length; i++) {

			var $curHr = hrObjects[i],
				$firstVisibleBlock = $curHr.$blocks.not(':hidden').first();

			if($firstVisibleBlock.length <1) {
				continue;
			}

			if(!$curHr.currentBlock || ($curHr.currentBlock.get(0) != $firstVisibleBlock.get(0) ) ){

				if($curHr.currentBlock) {
					$curHr.currentBlock.css({
						marginRight: $curHr.currentBlock.get(0).initialMarginRight + 'px'
					});
				}

				$curHr.currentBlock = $firstVisibleBlock;
				if(!$curHr.currentBlock.get(0).initialMarginRight){
					$curHr.currentBlock.get(0).initialMarginRight = parseInt($firstVisibleBlock.css('margin-right'), 10);
				}

				$firstVisibleBlock.css({
					marginRight: 0
				});

			}

		}
	}

	$w.resize(function(){

		clearTimeout(tmt);

		tmt = setTimeout(function(){

			checkHeaderBlocks();

		}, 300);

	});

	checkHeaderBlocks();

	//endregion

});

