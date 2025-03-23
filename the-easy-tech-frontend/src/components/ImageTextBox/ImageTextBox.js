import React from 'react'
import SectionImage from './SectionImage/SectionImage'

const ImageTextBox = ({
    img,
    section,
    direction="right",
}) => {
    return <div className='about-block lg:py-[100px] sm:py-16 py-10 bg-white'>
        <div className='container'>
            <div className={`row flex max-lg:flex-col lg:items-center gap-y-6 ${direction === "right" ? "" : "flex-row-reverse"}`}>
                <SectionImage direction={direction} img={img} />
                {section}
            </div>
        </div>
    </div>
}

export default ImageTextBox;