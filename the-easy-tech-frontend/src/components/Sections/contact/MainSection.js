import React from 'react'

import LeftSection from './LeftSection'
import RightSection from './RightSection'

const MainSection = () => {
    return <div className='form-contact lg:py-[100px] sm:py-16 py-10'>
        <div className='container flex items-center justify-center'>
            <div className='xm:w-5/6 w-full flex max-lg:flex-col xl:items-center gap-y-8'>
                <LeftSection />
                <RightSection />            
            </div> 
        </div> 
    </div> 
};

export default MainSection