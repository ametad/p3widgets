<div class="widget" id="<?php echo P3WidgetContainer::WIDGET_CSS_PREFIX . $model->id ?>">
	<div class="admin-panel">
		<h1><?php echo $headline ?></h1>
		<div>
			<?php
			if (Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessUpdate)) {
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					'url' => array('/p3widgets/p3widget/update', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-wrench"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
				));
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					'url' => array('/p3widgets/p3Widget/view', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-document"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
				));
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					'url' => array('/p3widgets/p3WidgetMeta/update', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-info"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
				));
				echo '<div class="handle">';
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					'name' => 'btnClick2' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-arrow-4"}'),
					#'onclick' => 'js:function(){alert("tbd: drag and drop"); this.blur(); return false;}',
				));
			}
			if (Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessDelete)) {
				echo '</div>';
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'id' => 'delete-' . $model->id,
					'buttonType' => 'link',
					'htmlOptions' => array('class' => 'delete'),
					'name' => 'btnClick3' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-close"}'),
					// onclick' => see container.js,
				));
			}
			?>
		</div>
	</div>
	<div class="content-panel">
		<?php echo $content; ?>
	</div>
</div>
