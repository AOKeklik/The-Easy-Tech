import CounterItem from "./CounterItem/CounterItem"

const Counter = () => {
      const counters = [
        { title: "Business Setup Growth", number: 2.3 },
        { title: "Business Passive Income", number: 1.7 },
        { title: "Business Problem Solving", number: 298 },
        { title: "Business Goal Achivever", number: 246 },
      ]

    return <div className='container bg-slate-100 rounded-md pt-8'>
        <div className="counter-block lg:pb-[50px] sm:pb-16 pb-10">
            <div className='grid xl:grid-cols-4 grid-cols-2 gap-y-8'>
                {
                    counters.length > 0 && counters.map(({title,number},i) => <CounterItem key={i} {...{title,number}} />)
                }
            </div>
        </div>
    </div>
}

export default Counter;