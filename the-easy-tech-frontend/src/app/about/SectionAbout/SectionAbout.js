import React from 'react';
import SectionLeft from './SectionLeft/SectionLeft';
import SectionRight from './SectionRight/SectionRight';

const SectionAbout = () => {
    return <div className='about-block lg:py-[100px] sm:py-16 py-10 bg-white'>
        <div className='container'>
            <div className='row flex max-lg:flex-col lg:items-center gap-y-6'>
                <SectionLeft />
                <SectionRight />
            </div>
        </div>
    </div>
};

export default SectionAbout;