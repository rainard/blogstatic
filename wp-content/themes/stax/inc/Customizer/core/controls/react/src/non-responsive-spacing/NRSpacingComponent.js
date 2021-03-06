/* jshint esversion: 6 */
import PropTypes from "prop-types";
import classnames from "classnames";
import SizingControl from "../common/Sizing.js";

import { useState, useEffect } from "@wordpress/element";
import { Button } from "@wordpress/components";
import { __ } from "@wordpress/i18n";

const NRSpacingComponent = ({ control }) => {
	const { params = {}, setting } = control;

	const controlParams = {
		min: 0,
		max: 300,
		units: ["px", "em", "%"],
		label: false,
		defaultVal: { top: "", right: "", bottom: "", left: "", unit: "px" },
		...params,
	};

	const { min, max, units, label, defaultVal } = controlParams;
	const [value, setValue] = useState({
		...defaultVal,
		...setting.get(),
	});
	const { top, right, bottom, left, unit } = value;

	// Used for outside value changes.
	useEffect(() => {
		global.addEventListener("stax-changed-customizer-value", (e) => {
			if (!e.detail) return false;
			if (e.detail.id !== control.id) return false;

			const nextVal = e.detail.value || defaultVal;

			handleUpdate(nextVal);
		});
	}, []);

	const options = [
		{ type: "top", label: __("Top", "stax"), value: top },
		{ type: "right", label: __("Right", "stax"), value: right },
		{ type: "bottom", label: __("Bottom", "stax"), value: bottom },
		{ type: "left", label: __("Left", "stax"), value: left },
	];

	const handleReset = () => {
		handleUpdate(defaultVal);
	};

	const handleUpdate = (nextValue) => {
		setValue(nextValue);
		setting.set(nextValue);
	};

	const updateNumericValue = (val) => {
		handleUpdate({ ...val, unit });
	};

	const handleUnitChange = (unitType) => {
		const nextValue = { ...value };
		nextValue.unit = unitType;

		if (unitType !== "em") {
			nextValue.top = parseInt(nextValue.top);
			nextValue.right = parseInt(nextValue.right);
			nextValue.bottom = parseInt(value.bottom);
			nextValue.left = parseInt(value.left);
		}

		handleUpdate(nextValue);
	};

	const Units = () => {
		if (units.length === 1) {
			return (
				<Button isSmall disabled className="active alone">
					{units[0]}
				</Button>
			);
		}

		return units.map((unitType, index) => {
			const buttonClass = classnames({
				active: unit === unitType,
			});
			return (
				<Button
					key={index}
					isSmall
					className={buttonClass}
					onClick={() => handleUnitChange(unitType)}
				>
					{unitType}
				</Button>
			);
		});
	};

	const wrapClasses = classnames([
		"stax-white-background-control",
		"stax-sizing",
	]);

	return (
		<div className={wrapClasses}>
			<div className="stax-control-header">
				{label && (
					<span className="customize-control-title">{label}</span>
				)}
				<div className="stax-units">
					<Units />
				</div>
			</div>
			<SizingControl
				min={min}
				max={max}
				step={unit === "em" ? 0.1 : 1}
				options={options}
				defaults={defaultVal}
				onChange={updateNumericValue}
				value={value}
				onReset={handleReset}
			/>
		</div>
	);
};

NRSpacingComponent.propTypes = {
	control: PropTypes.object.isRequired,
};

export default NRSpacingComponent;
